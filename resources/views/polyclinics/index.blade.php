@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Polyclinics') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
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
                            <td>{{ $polyclinic->name }}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
