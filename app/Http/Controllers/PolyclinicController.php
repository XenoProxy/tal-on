<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polyclinic;

class PolyclinicController extends Controller
{
    public function index()
    {
        $polyclinics = Polyclinic::latest()->paginate(5);
        return view('polyclinics.index', compact('polyclinics'))->with('i', (request()->input('page', 1) - 1) * 5);
    }    

    public function show(Polyclinic $polyclinic)
    {
        return view('polyclinics.show', compact('polyclinic'));
    }
}
