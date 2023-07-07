<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Polyclinic;

class TicketController extends Controller
{
    public function create(Doctor $doctors, Polyclinic $polyclinics)
    {
        $doctors = Doctor::all();
        $polyclinics = Polyclinic::all();
        return view('tickets.create', compact('doctors', 'polyclinics'));
    }
}
