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
        $appointment = Appointment::create([
            "doctor_id" => $appointmentInfo["doctor"],
            "comments" => $appointmentInfo["date"].' '. $appointmentInfo["time"]
        ]);
        return $appointment->id;
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }
}
