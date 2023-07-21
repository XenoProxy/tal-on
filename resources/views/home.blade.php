@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <img class="home-banner" src="/images/doctor-hands-in-green-latex-gloves-hold-phone.jpg">
        <div class="col-md-8">
            
        </div>
        <a class="btn btn-info" href="{{ route('polyclinics.index') }}">Order the ticket</a>
    </div>
</div>
@endsection
