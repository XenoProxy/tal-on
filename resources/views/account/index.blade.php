@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div id="isLiked" style="display:none;"></div>
            <div class="pull-left">
                <h2>Account</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Polyclinic:</strong>
                {{ $polyclinic_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <a class="btn btn-info" href="{{ route('tickets.create') }}">Order the ticket</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Appointments') }}</strong></div>
                
                <div class="card-body">                                
                    <table class="table table-bordered">
                        <tr>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Polyclinic</th>
                        </tr>
                        
                        <tr>
                            <td>Doctor</td>
                            <td>Date</td>
                            <td>Polyclinic</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>  

@endsection
