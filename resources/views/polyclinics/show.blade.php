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
        
        @foreach($sorted_date as $date)                
                @foreach ($polyclinic_doctors as $doctor)
                    <div class="row justify-content-left" style="justify-content: left">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="doctor_id" id="doctor_id" value="{{ $doctor->id }}">
                                    <p id="date" value="{{ $date }}">{{ $date }}</p>
                                    <p>{{ $doctor->name }} {{ $doctor->field }} {{ $doctor->office }}</p>
                                    @foreach ($time as $t)
                                        <button class="btn btn-info" id="time" value="{{ $time[$loop->index] }}">{{ $time[$loop->index] }}</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach                
        @endforeach
       
    </div>

@endsection