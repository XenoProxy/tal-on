@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <img class="card-ico" src="/images/mark_10099892.png">
                    {{ __('You have successfully made an appointment!') }}                    
                </div>

                <div class="card-body">
                    <p>Your appointment's number <b>{{ $appointment->id }}</b></p>

                    <p>For <b>{{ $appointment->date }}</b> at <b>{{ $appointment->time }}</b>
                    to the {{ $doctor->name }} in the {{ $doctor->office }} office.</p>

                    <p>If you want to cancel or reschedule the appointment, call the phone number {{ $contacts }}</p>

                    <p>We'll expect you at that time.</p>
                    
                    <a class="btn btn-info btn-card" href="{{ route('home') }}">Home</a>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
