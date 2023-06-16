<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Polyclinic;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->paginate(5);
        return view('doctors.index', compact('doctors'))->with('i', (request()->input('page', 1) - 1) * 5);
    }   

    public function show(Doctor $doctor)
    {
        $polyclinic_name = $doctor->polyclinic->name;
        return view('doctors.show', compact('doctor', 'polyclinic_name'));
    }
}
