<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $polyclinic_name = $user->polyclinic->name;
        return view('account.index', compact('user', 'polyclinic_name'));
    } 

}
