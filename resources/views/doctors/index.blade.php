@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Doctors') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Field</th>
                            <th>Polyclinic</th>
                            @if($isAdmin)
                                <th>Actions</th>
                            @endif
                        </tr>
                        @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->field }}</td>
                            <td>
                                <a href="{{ route('polyclinics.show', $doctor->poly_id) }}">{{ $doctor->polyclinic->name }}</a>
                            </td>
                            <td>
                            <form action="#" method="POST">
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
        </div>
    </div>
</div>
@endsection
