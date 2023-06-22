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
        @foreach($sorted_date as $date)              
            @foreach ($polyclinic_doctors as $doctor)
                <div class="row justify-content-left" style="justify-content: left">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <data type="hidden" id="date_count" value="{{$loop->parent->count-1}}"></data>
                                <data type="hidden" id="doctor_count" value="{{$loop->count-1}}"></data>
                                
                                <data type="hidden" name="_token" id="token" value="{{ csrf_token() }}"></data>                                
                                <data type="hidden" name="doctor_id" id="doctor_id" value="{{ $doctor->id }}"></data>
                                <data id="date" value="{{ $date }}">{{ $date }}</data>

                                <p>{{ $doctor->name }} {{ $doctor->field }} {{ $doctor->office }}</p>

                                @foreach ($times as $time)
                                    <data type="hidden" id="time_count" value="{{$loop->count-1}}"></data>

                                    <data type="hidden" name="time" id="time" value="{{ $time }}"></data>
                                    <button class="btn btn-info" id="appointment" 
                                        value="{{$loop->parent->parent->index}} {{ $loop->parent->index }} {{ $loop->index }}">
                                        {{$loop->parent->parent->index}} {{ $loop->parent->index }} {{ $loop->index }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach              
        @endforeach
    </div>

@endsection