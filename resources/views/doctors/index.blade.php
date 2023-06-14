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

                    {{ __('Our doctors list here') }}
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Field</th>
                            <th>Polyclinic</th>
                        </tr>
                        @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->field }}</td>
                            <td>{{ $doctor->poly_id }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('doctors.show', $doctor->id) }}">Show</a>
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
