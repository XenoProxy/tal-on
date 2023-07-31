@extends('layouts.app')

@section('content')
<div class="container">
    <div class="edit-container">
        <h2 class="edit-create-head">Edit Doctor</h2>
        <div class="pull-right">
            <a class="btn btn-primary btn-back" href="{{ route('polyclinics.index') }}"> Back</a>
        </div>

        <form action="{{ route('doctors.update', $doctor->id) }}" method="post">
            @csrf
            @method('PUT')            
            <div class="form-container polyclinic-form">
                <div class="form-item">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" placeholder="Name">
                </div>

                <div class="form-item">
                    <strong>Field:</strong>
                    <input type="text" name="field" value="{{ $doctor->field }}" class="form-control" placeholder="Field">
                </div>

                <div class="form-item">
                    <strong>Office:</strong>
                    <input type="text" name="office" value="{{ $doctor->office }}" class="form-control" placeholder="Office">
                </div>

                <div class="form-item">
                    <strong>Info:</strong>
                    <textarea name="info" style="height:300px" class="form-control" placeholder="Info">{{ $doctor->info }}</textarea>
                </div>  
                            
                <button type="submit" class="btn btn-primary admin-submit-btn">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection