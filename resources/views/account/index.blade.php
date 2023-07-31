@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="center">
            <h2 class="account-head">My Account</h2>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Card Number:</strong>
                    {{ $user->id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <a class="btn btn-info" href="{{ route('polyclinics.index') }}">Order the ticket</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="card">
                    <div class="card-header"><strong>{{ __('My appointments') }}</strong></div>
                    
                    <div class="card-body">    
                        <table class="table table-bordered">
                            <tr>
                                <th>№</th>
                                <th>Polyclinic</th>
                                <th>Doctor</th>
                                <th>Office</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Comments</th>
                            </tr>
                            @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $polyclinics[$appointment->doctor->poly_id-1]["name"] }}</td>
                                <td>{{ $appointment->doctor->name }}</td>
                                <td>{{ $appointment->doctor->office }}</td>
                                <td>{{ date("l - d F Y", strtotime($appointment->date)) }}</td>
                                <td> {{ date("H:i", strtotime($appointment->time)) }}</td>
                                <td> {{ $appointment->comments }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>

@endsection
