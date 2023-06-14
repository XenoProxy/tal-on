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

                    {{ __('Our polyclinic list here') }}
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                        </tr>
                        @foreach ($polyclinics as $polyclinic)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $polyclinic->name }}</td>
                            <td>{{ $polyclinic->address }}</td>                        
                            <td>
                                <a class="btn btn-info" href="{{ route('polyclinics.show', $polyclinic->id) }}">Show</a>
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
