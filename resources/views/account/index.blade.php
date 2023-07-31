@extends('layouts.app')

@section('content')

    <div class="container">     
        <div class="table-container">
            <div class="my-appointments">
                <h2 class="appointments-table-head">{{ __('My appointments') }}</h2> 
            </div>  

            <div class="user-info">
                <div class="info-item">
                    <strong>Card Number:</strong>
                    {{ $user->id }}
                </div>
                <div class="info-item">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            
            <div class="my-appointments">
                <a class="btn btn-info order-home" href="{{ route('polyclinics.index') }}">Order the ticket</a>
            </div> 

            @if (count($appointments) !== 0)
                <table class="table table-appointments">                
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
            @endif            
        </div>
    </div> 

@endsection
