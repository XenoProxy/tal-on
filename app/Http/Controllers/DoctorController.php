<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->paginate(5);
        return view('doctors.index', compact('doctors'))->with('i', (request()->input('page', 1) - 1) * 5);
    }   

    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }
}
