<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Polyclinic;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $appointments = Appointment::where('user_id', $user->id)->get();
        $polyclinics = Polyclinic::all()->toArray();
        return view('admin.index', compact('user', 'appointments', 'polyclinics'));
    } 
}
