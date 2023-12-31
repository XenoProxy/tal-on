@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 

    <a class="btn btn-primary btn-back" href="{{ url()->previous() }}"> Back</a>

    <div class="apnt-edit-container">
        <h2 class="text-center patient-data">Patient Data</h2>

        <div class="appointment-row">  
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="info-item">
                    <strong>Polyclinic:</strong> {{ $doctor->polyclinic->name }}
                </div>
            </div>      
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="info-item">
                    <strong>Doctor:</strong> {{ $doctor->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="info-item">
                    <strong>Field:</strong> {{ $doctor->field }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="info-item">
                    <strong>Office:</strong> {{ $doctor->office }}
                </div>
            </div>        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="info-item">
                    <strong>Date:</strong> 
                    {{ date("l - d F Y", strtotime($appointment->date)) }}
                </div>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="info-item">
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
                    <input type="text" name="user_name" class="form-control form-edit" placeholder="Name">
                </div>
                <div class="form-item">
                    <strong>Email:</strong>
                    <div class="text-field__icon text-field__icon_email">
                        <input type="text" name="user_contacts" class="form-control form-edit" placeholder="Email">
                    </div>
                </div>
                <div class="form-item">
                    <strong>Comments:</strong>
                    <textarea class="form-control form-edit" style="height:100px" name="comments" placeholder="Comments"></textarea>
                </div>            
                <div class="text-center">              
                    <button type="submit" class="btn submit-btn">Order the ticket</button>
                </div>
            </div>
        </form>
    </div>
    
</div>
@endsection
