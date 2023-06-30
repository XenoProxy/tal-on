<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Appointment;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $appointments = Appointment::where('user_id', $user->id)->get();
        $polyclinic_name = $user->polyclinic->name;
        return view('account.index', compact('user', 'polyclinic_name', 'appointments'));
    } 

}
