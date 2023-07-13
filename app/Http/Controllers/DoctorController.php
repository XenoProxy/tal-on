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
        $isAdmin = false;
        if(auth()->id() == 1) {
            $isAdmin = true;
        }
        
        return view('doctors.index', compact('doctors', 'isAdmin'));
    }   

    public function show(Doctor $doctor)
    {
        $polyclinic_name = $doctor->polyclinic->name;
        return view('doctors.show', compact('doctor', 'polyclinic_name'));
    }
}
