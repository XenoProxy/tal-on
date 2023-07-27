@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="doctor-container">  
    <div class="pull-right">
        <a class="btn btn-primary btn-back" href="{{ route('doctors.index') }}"> Back</a>
    </div>  
    <h2 class="show-doctor doctor-name-show">{{ $doctor->name }}</h2>     
        <img class="doctor-photo" src="https://via.placeholder.com/250x300" alt="">
                    
        <div class="info-item">
            <strong>Field:</strong>
            {{ $doctor->field }}
        </div>

        <div class="info-item">
            <strong>Office:</strong>
            {{ $doctor->office }}
        </div>

        <div class="info-item">
            <strong>Polyclinic:</strong>
            <a href="{{ route('polyclinics.show', $doctor->poly_id) }}">{{ $polyclinic_name }}</a>                
        </div>    
        
        <div class="doctor-summary">{{ $doctor->info }}</div>
    </div>    
</div>
@endsection