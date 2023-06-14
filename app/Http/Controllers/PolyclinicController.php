<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolyclinicController extends Controller
{
    public function index()
    {
        return view('polyclinics.index');
    }    
}
