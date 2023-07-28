@extends('layouts.app')

@section('content')
<div class="container apnt-container">
    <a class="btn btn-primary btn-back" href="{{ url()->previous() }}"> Back</a>
    <h2>Patient Data</h2>

    <div class="appointment-row">        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Doctor:</strong> {{ $doctor->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Field:</strong> {{ $doctor->field }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Office:</strong> {{ $doctor->office }}
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
                {{ date("H:i", strtotime($appointment->time)) }}
            </div>
        </div>              
    </div> 
    
    <form action="{{ route('appointments.update', $appointment->id) }}" method="post">
    @csrf
    @method('PUT')
        <div class="form-container">
            <div class="form-item">
                <strong>Name:</strong>
                <input type="text" name="user_name" class="form-control" placeholder="Name">
            </div>
            <div class="form-item">
                <strong>Email:</strong>
                <input type="text" name="user_contacts" class="form-control" placeholder="Email">
            </div>
            <div class="form-item">
                <strong>Comments:</strong>
                <textarea class="form-control" style="height:100px" name="comments" placeholder="Comments"></textarea>
            </div>            
            <div class="text-center">              
                <button type="submit" class="btn submit-btn">Order the ticket</button>
            </div>
        </div>
    </form>
</div>
@endsection
