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
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Field</th>
                <th>Office</th>
            </tr>
            @foreach ($polyclinic_doctors as $doctor)
            <tr>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->field }}</td>
                <td>{{ $doctor->office }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection