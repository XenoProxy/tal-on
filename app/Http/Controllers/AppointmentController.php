<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function getDoctor(Request $request)
    {
        $appointmentInfo = $request->all();
        Appointment::create($appointmentInfo);
        dd($appointmentInfo);
        //return redirect()->route('appointments.index')->withInput();        
    }

    public function index()
    {
        // $events = [];
        $appointments = Appointment::all();
 
        // $appointments = Appointment::with(['user', 'doctor'])->get();
 
        // foreach ($appointments as $appointment) {
        //     $events[] = [
        //         'title' => $appointment->user->name . ' ('.$appointment->doctor->name.')',
        //         'start' => $appointment->start_time,
        //         'end' => $appointment->finish_time,
        //     ];
        // }
        
        //dd($appointments);
        return view('appointments.index', compact('appointments'));
    }
}
