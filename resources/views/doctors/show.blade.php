@extends('layouts.app')

@section('content')
<div class="doctor-container"> 
    <h2 class="show-doctor doctor-name">{{ $doctor->name }}</h2>

    <div class="pull-right">
        <a class="btn btn-primary btn-back" href="{{ route('doctors.index') }}"> Back</a>
    </div>

    <div class="doctor-info">
                
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

    </div>
     
    <div class="doctor-summary">
        <strong>Info:</strong>
        {{ $doctor->info }}
    </div>
</div>    
@endsection