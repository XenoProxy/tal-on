<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Doctor;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $appointments = Appointment::where('user_id', $user->id)->get();
        //$doctor_name = $appointments->doctor->name;
        //$polyclinic_name = $user->polyclinic->name;     
        return view('account.index', compact('user', 'appointments'));
    } 

}
