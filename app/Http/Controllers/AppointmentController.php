<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Models\Appointment;
use App\Models\User;

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

        $request->validate([
            'user_name' => 'required', 
        ]);
        $user_name = $request->get('user_name');
        $user = User::where('name', $user_name)->get();
        $user_id = NULL;

        if($user instanceof User){
            $user_id = $user->id;
        }

        $appointment->update([
            'user_id' => $user_id,
            'comments' => $request->get('comments')
        ]);

        return redirect()->route('home')
            ->with('success', 'Appointment ordered successfully');
    }
}
