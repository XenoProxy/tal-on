@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Polyclinic</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('polyclinics.index') }}"> Back</a>
        </div>
    </div>
</div>
<form action="{{ route('polyclinics.update', $polyclinic->id) }}" method="post">
    @csrf
    @method('PUT')
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $polyclinic->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="Address">{{ $polyclinic->address }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contacts:</strong>
                    <input type="text" name="contacts" value="{{ $polyclinic->contacts }}" class="form-control" placeholder="Contacts">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">              
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
@endsection