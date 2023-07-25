@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if($isAdmin)
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('doctors.create') }}"> Create New Doctor</a>
            </div>
        @endif

        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <table class="table doctor">
            <tr>
                <th>Name</th>
                <th>Field</th>
                <th>Polyclinic</th>                
                <th>Actions</th>
                
            </tr>
            @foreach ($doctors as $doctor)
            <tr>
                <td class="doctor-name">{{ $doctor->name }}</td>
                <td>{{ $doctor->field }}</td>
                <td>
                    <a href="{{ route('polyclinics.show', $doctor->poly_id) }}">{{ $doctor->polyclinic->name }}</a>
                </td>
                <td>
                <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('doctors.show', $doctor->id) }}">Details</a>
                    @if($isAdmin)                                
                        <a class="btn btn-primary" href="{{ route('doctors.edit', $doctor->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>                                
                    @endif
                </form>
                </td>                            
            </tr>
            @endforeach
        </table>
        
    </div>
</div>
@endsection
