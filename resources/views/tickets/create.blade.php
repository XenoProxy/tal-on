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
                    <strong>Polyclinic:</strong>                                         
                    <div class="col-sm" id="js-result_p"></div>
                </div>
            </div></br>   

            <div class="col-xs-12 col-sm-12 col-md-18">
                <div class="form-group">
                    <strong>Doctor's field:</strong>                
                    <div class="col-sm" id="js-result_df"></div>
                </div>
            </div></br>
            
            <div class="col-xs-12 col-sm-12 col-md-18">
                <div class="form-group">
                    <strong>Doctor's name:</strong>                
                    <div class="col-sm" id="js-result_dn"></div>
                </div>
            </div></br> 

            <table class="table table-bordered" id="filter-table">
                <tr>
                    <th>Name</th>
                    <th>Field</th>
                    <th>Polyclinic</th>
                </tr>
                <tr class='table-filters'>
                    <td></td>
                    <td>
                        <select name="doctor_field" class="custom-select ">
                            <option value=""> </option>
                            @foreach($doctors as $doctor)
                                <option class="field" value="{{ $doctor->field }}"> {{ $doctor->field }} </option>
                            @endforeach
                        </select></br>
                    </td>
                    <td>
                        <select name="polyclinic" class="custom-select">
                            <option value=""> </option>
                            @foreach($polyclinics as $policlynic)
                                <option value="{{ $policlynic->name }}"> {{ $policlynic->name }} </option>
                            @endforeach
                        </select></br>
                    </td>
                </tr>
                @foreach ($doctors as $doctor)
                <tr class='table-data'>
                    <td>
                        <input type="hidden" class="doctor_name" value="{{ $doctor->name }}">
                        {{ $doctor->name }}
                    </td>
                    <td>
                        <input type="hidden" class="doctor_field" value="{{ $doctor->field }}">
                        {{ $doctor->field }}
                    </td>
                    <td>
                        <input type="hidden" class="poly_name" value="{{ $doctor->polyclinic->name }}">
                        {{ $doctor->polyclinic->name }}
                    </td>
                    <td>
                        <a class="done" id="{{ $doctor->id-1 }}" name="name">Select</a>
                    </td>
                </tr>
                @endforeach
            </table>

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