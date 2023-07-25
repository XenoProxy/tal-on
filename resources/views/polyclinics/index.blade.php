@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if($isAdmin)
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('polyclinics.create') }}"> Create New Polyclinic</a>
            </div>
        @endif
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <table class="table">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Contacts</th>
                <th>Order ticket</th>
                @if($isAdmin)
                    <th>Actions</th>
                @endif
            </tr>
            
            @foreach ($polyclinics as $polyclinic)
            <tr>
                <td class="polyclinic-name">{{ $polyclinic->name }}</td>
                <td>{{ $polyclinic->address }}</td>
                <td>{{ $contacts[$loop->index] }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('polyclinics.show', $polyclinic->id) }}">Order</a>
                </td>
                @if($isAdmin)
                <td>
                    <form action="{{ route('polyclinics.destroy', $polyclinic->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('polyclinics.edit', $polyclinic->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </table>  
        
        <div class="polyclinic-info">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In arcu cursus euismod quis. Sed risus ultricies tristique nulla aliquet enim tortor at. Ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Aliquam id diam maecenas ultricies mi eget mauris. Sed pulvinar proin gravida hendrerit lectus. Bibendum ut tristique et egestas quis ipsum. Nulla aliquet enim tortor at. Lorem donec massa sapien faucibus. Amet volutpat consequat mauris nunc congue nisi. Arcu dui vivamus arcu felis bibendum ut tristique. Phasellus vestibulum lorem sed risus ultricies tristique nulla aliquet enim.
        </div>
    </div>
</div>
@endsection
