@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="home-container">
        <div class="home-head">
            <h2>How to order a ticket by our website</h2> 
        </div>           
            
        <div class="home-info">
            <div class="highlight">
                Through the Tal-On, you can make an appointment with doctors in city medical institutions. If your clinic is not on our website, you can order a ticket through the registry or another online service to which it is connected. And through the account on the Coupon, you can sign up for paid services at any available medical institution.
            </div>
            
            At auctor urna nunc id cursus metus aliquam eleifend. Congue quisque egestas diam in arcu cursus euismod quis viverra. Tristique magna sit amet purus gravida quis blandit turpis cursus. Ipsum suspendisse ultrices gravida dictum fusce. Amet est placerat in egestas erat imperdiet sed. Venenatis tellus in metus vulputate eu. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Bibendum arcu vitae elementum curabitur vitae nunc. Blandit volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque. Quam quisque id diam vel quam elementum pulvinar etiam. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Nunc sed velit dignissim sodales ut eu. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Eu augue ut lectus arcu.
            
            <div class="highlight">
                The number of coupons available for ordering online is determined by the administration of the polyclinic. Our service only displays up-to-date information.
            </div>
            
        </div>
        <a class="btn btn-info order-home" href="{{ route('polyclinics.index') }}">Order the ticket</a>
    </div>      
</div>
@endsection
