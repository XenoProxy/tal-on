<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function getDoctor(Request $request)
    {
        $appointment = $request->all();
    }

    public function index()
    {
        $events = [];
 
        $appointments = Appointment::with(['user', 'doctor'])->get();
 
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->user->name . ' ('.$appointment->doctor->name.')',
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        }
 
        return view('appointments.index', compact('events'));
    }
}
