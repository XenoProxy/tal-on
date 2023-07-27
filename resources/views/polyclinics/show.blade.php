@extends('layouts.app')

@section('content')
    <div class="container apnt-container">
    <a class="btn btn-primary btn-back" href="{{ route('polyclinics.index') }}"> Back</a>
        <div class="appointment-head">
            <h2 class="polyclinic-name-show">{{ $polyclinic->name }}</h2>

            <div class="row">
                <div class="info-item">
                    <strong>Address:</strong>
                    {{ $polyclinic->address }}
                </div>
                <div class="info-item">
                    <strong>Contacts:</strong>
                    {{ $contacts[$polyclinic->id-1] }}
                </div>
            </div>
        </div>
        
        <label for="field-filter"><strong>Filter by field: </strong></label>
        <select class="select">
            <option value="">Not Selected</option>
            @foreach($polyclinic_doctors as $doctor)
                <option value="{{ $doctor->field }}">{{ $doctor->field }}</option>
            @endforeach
        </select>

        <div class="row">
        @csrf
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            @foreach($date_time_arr as $date => $doctors)              
                @foreach ($doctors as $doctor => $times)                        
                        <div class="card">
                            <data class="date" value="{{ $date }}">{{ date("l - d F Y", strtotime($date)) }}</data>
                            <input type="hidden" class="doctor" value="{{ $doctor }}">  
                            <input type="hidden" class="field" value="{{ $polyclinic_doctors[$loop->index]->field }}">
                            <p>
                                {{ $polyclinic_doctors[$loop->index]->name }}
                                {{ $polyclinic_doctors[$loop->index]->field }}
                                {{ $polyclinic_doctors[$loop->index]->office }}
                            </p>                            
                            <div class="appointment">
                                @foreach ($times as $time)
                                    <span class="time">                                        
                                        <button class="btn btn-info apnt-btn" style="margin: 2px;" name="time" value="{{ $time }}">{{ date("H:i", strtotime($time)) }}</button>
                                    </span>                                        
                                @endforeach
                            </div>
                        </div>
                @endforeach              
            @endforeach
        </div>
    </div>
@endsection