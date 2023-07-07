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
        $doctor = $appointment->doctor->name;
        $field = $appointment->doctor->field;
        $office = $appointment->doctor->office;
        return view('appointments.edit', compact('appointment', 'doctor', 'field', 'office'));
    }

    public function update(Request $request, Appointment $appointment)
    {

        $request->validate([
            'user_name' => 'required',
            'email' => 'email:rfc',
            'comments' => 'min:0|max:100'            
        ]);
        $user_name = $request->get('user_name');
        $user = User::where('name', $user_name)->first();
        
        if($user instanceof User){
            $user_id = $user->id;
        } else{
            $user_id = NULL;
        }
        //dd($user->name);
        $appointment->update([
            'user_id' => $user_id,
            'comments' => $request->get('comments')
        ]);

        return redirect()->route('home')
            ->with('success', 'Appointment ordered successfully');
    }
}
