@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div id="isLiked" style="display:none;"></div>
            <div class="pull-left">
                <h2> Show Polyclinic</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('polyclinics.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $polyclinic->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $polyclinic->address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contacts:</strong>
                {{ $contacts[$polyclinic->id-1] }}
            </div>
        </div>
    </div>
    
    <label for="field-filter"><strong>Filter by field: </strong></label>
    <select class="field-filter">
        <option value="">-- Choose the field --</option>
        @foreach($polyclinic_doctors as $doctor)
            <option value="{{ $doctor->field }}">{{ $doctor->field }}</option>
        @endforeach
    </select>

    <div class="row">
    @csrf
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        @foreach($date_time_arr as $date => $doctors)              
            @foreach ($doctors as $doctor => $times)
                <div class="row justify-content-left" style="justify-content: left; margin: 4px;">
                    <div class="col-md-8">
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
                    </div>
                </div>
            @endforeach              
        @endforeach
    </div>

@endsection