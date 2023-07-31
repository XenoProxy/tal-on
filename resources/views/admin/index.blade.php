@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div id="isLiked" style="display:none;"></div>
            <div class="pull-left">
                <h2>Admin Panel</h2>
            </div>
        </div>
    </div>

    <div class="row">        
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

@endsection
