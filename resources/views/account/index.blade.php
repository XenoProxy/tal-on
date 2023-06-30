@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div id="isLiked" style="display:none;"></div>
            <div class="pull-left">
                <h2>Account</h2>
            </div>
        </div>
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
                            <th>Appointment №</th>
                            <th>Polyclinic</th>
                            <th>Doctor</th>
                            <th>Office</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->doctor->poly_id }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->doctor->office }}</td>
                            <td>{{ date("l - d F Y", strtotime($appointment->date)) }}</td>
                            <td> {{ date("H:i", strtotime($appointment->time)) }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>  

@endsection
