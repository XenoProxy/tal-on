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
    
    <div class="row">
    @csrf
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        @foreach($sorted_date as $date)              
            @foreach ($polyclinic_doctors as $doctor)
                <div class="row justify-content-left" style="justify-content: left">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" class="date_count" value="{{$loop->parent->count}}">
                                <data class="date" id="{{ $loop->parent->index }}" value="{{ $date }}">{{ $date }}</data>

                                <input type="hidden" class="doctor_count" value="{{$loop->count}}">
                                <input type="hidden" class="doctor" id="doctor" value="{{ $doctor->id }}">  
                                <p>{{ $doctor->name }} {{ $doctor->field }} {{ $doctor->office }}</p>                           

                                @foreach ($times as $time)
                                    <input type="hidden" class="time_count" value="{{$loop->count}}">
                                    <input type="hidden" id="time_id" value="{{ $loop->index }}">
                                    <input type="hidden" name="time" class="time" id="time" value="{{ $time }}">

                                    <span class="appointments">
                                        <button class="btn btn-info" id="{{$loop->parent->parent->index}}{{ $doctor->id }}{{ $loop->index }}" 
                                            value="{{ $time }}">
                                            {{ $time }}
                                        </button>
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