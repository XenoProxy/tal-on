<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Models\Appointment;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    public function getDoctor(Request $request)
    {
        $appointmentInfo = $request->all();
        $appointment = Appointment::create([
            "doctor_id" => $appointmentInfo["doctor"],
            "date" => $appointmentInfo["date"],
            "time" => $appointmentInfo["time"]
        ]);
        return $appointment->id;
    }

    public function edit(Appointment $appointment)
    {
        $appointment_doctor = $appointment->doctor->name;
        return view('appointments.edit', compact('appointment', 'appointment_doctor'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        // $request->validate([
        //     'user_id' => 'required', 
        // ]);

        $appointment->update($request->all());

        // return redirect()->route('products.index')
        //     ->with('success', 'Product edited successfully');
    }
}
