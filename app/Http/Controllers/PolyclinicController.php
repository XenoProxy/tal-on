<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polyclinic;

class PolyclinicController extends Controller
{
    public function index()
    {
        $polys = Polyclinic::latest()->paginate(5);
        return view('polyclinics.index', compact('polys'))->with('i', (request()->input('page', 1) - 1) * 5);
    }    
}
