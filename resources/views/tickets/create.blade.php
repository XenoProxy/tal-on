@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ticket ordering</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('account.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="post">
        @csrf
                
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Polyclinic:</strong></br>
                    <select name="polyclinic" id="polyclinic" class="custom-select">
                        @foreach($polyclinics as $policlynic)
                            <option value="{{ $policlynic->name }}"> {{ $policlynic->name }} </option>
                        @endforeach
                    </select></br>
                    <div class="col-sm" id="js-result_p">
                        Результат: 
                    </div>
                </div>
            </div></br>      


            <div class="col-xs-12 col-sm-12 col-md-18">
                <div class="form-group">
                    <strong>Doctor:</strong></br>      
                    <select name="doctor_field" id="doctor_field"  class="custom-select ">
                        @foreach($doctors as $doctor)
                            <option class="field" value="{{ $doctor->field }}"> {{ $doctor->field }} </option>
                        @endforeach
                    </select></br>
                    <div class="col-sm" id="js-result_f">
                        Результат: 
                    </div></br>



                    <select name="doctor_name" id="doctor_name" class="custom-select">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->name }}"> {{ $doctor->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>

@endsection