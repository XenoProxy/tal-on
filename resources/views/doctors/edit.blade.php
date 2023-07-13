@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Doctor</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('doctors.index') }}"> Back</a>
        </div>
    </div>
</div>
<form action="{{ route('doctors.update', $doctor->id) }}" method="post">
    @csrf
    @method('PUT')
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Field:</strong>
                    <input type="text" name="field" value="{{ $doctor->field }}" class="form-control" placeholder="Field">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Office:</strong>
                    <input type="text" name="office" value="{{ $doctor->office }}" class="form-control" placeholder="Office">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">              
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
@endsection