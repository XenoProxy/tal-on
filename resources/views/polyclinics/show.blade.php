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
        <section>
            @foreach($sorted_date as $date)
                @foreach ($polyclinic_doctors as $doctor)
                    <p>{{ $date }}</p>
                    <p>{{ $doctor->name }} {{ $doctor->field }} {{ $doctor->office }}</p>
                    @foreach ($time as $t)
                        <button class="btn btn-info">{{ $time[$loop->index] }}</button>
                    @endforeach
                @endforeach
            @endforeach
        </section>
    </div>

@endsection