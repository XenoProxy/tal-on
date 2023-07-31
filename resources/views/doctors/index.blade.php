@extends('layouts.app')

@section('content')
<div class="container">
    <div class="doctor-table-container">  
        @if($isAdmin)
            <div class="create-btn">
                <a class="btn btn-success" href="{{ route('doctors.create') }}"> Create New Doctor</a>
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
                        <a class="btn btn-primary btn-edit" href="{{ route('doctors.edit', $doctor->id) }}">Edit</a>
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
