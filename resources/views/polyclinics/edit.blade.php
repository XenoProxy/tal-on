@extends('layouts.app')

@section('content')
<div class="container">
    <div class="edit-container">
        <h2 class="edit-create-head">Edit Polyclinic</h2>
        <div class="pull-right">
            <a class="btn btn-primary btn-back" href="{{ route('polyclinics.index') }}"> Back</a>
        </div>

        <form action="{{ route('polyclinics.update', $polyclinic->id) }}" method="post">
            @csrf
            @method('PUT')            
                <div class="form-container polyclinic-form">
                        <div class="form-item">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $polyclinic->name }}" class="form-control" placeholder="Name">
                        </div> 

                        <div class="form-item">
                            <strong>Address:</strong>
                            <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $polyclinic->address }}">
                        </div>
                    
                        <div class="form-item">
                            <strong>Contacts:</strong>
                            <input type="tel" name="contacts" value="{{ $polyclinic->contacts }}" class="form-control" placeholder="Contacts">
                        </div>
                                 
                        <button type="submit" class="btn btn-primary admin-submit-btn">Submit</button>
                </div>
        </form>
    </div>
</div>
@endsection