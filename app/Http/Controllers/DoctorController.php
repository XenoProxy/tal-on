<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Polyclinic;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }   

    public function show(Doctor $doctor)
    {
        $polyclinic_name = $doctor->polyclinic->name;
        return view('doctors.show', compact('doctor', 'polyclinic_name'));
    }
}
