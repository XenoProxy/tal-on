@extends('layouts.app')

@section('content')

    <h2>Appointment show</h2>
    {{ date("d F Y") }}
    <div class="row">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url()->previous() }}"> Back</a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Doctor:</strong> {{ $appointment_doctor }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong> 
                {{ date("l - d F Y", strtotime($appointment->date)) }}
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time:</strong> 
                {{ date("h:i", strtotime($appointment->time)) }}
            </div>
        </div>              
    </div> 
    
    <form action="{{ route('appointments.update', $appointment->id) }}" method="post">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="user_name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="user_contacts" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Comments:</strong>
                    <textarea class="form-control" style="height:100px" name="comments" placeholder="Comments"></textarea>
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">              
                <button type="submit" class="btn btn-primary">Order the ticket</button>
            </div>
        </div>
</form>

@endsection
