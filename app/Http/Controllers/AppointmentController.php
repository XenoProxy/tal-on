<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Appointment;
use App\Mail\NotificationOfAppointment;
use Illuminate\Support\Facades\Mail;

use App\Services\Polyclinics\ContactsService as ContactsService;

class AppointmentController extends Controller
{
    protected $contactsService = null;

    public function __construct(ContactsService $contactsService)
    {
        $this->contactsService = $contactsService;
    }

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
        $doctor = $appointment->doctor;

        return view('appointments.edit', compact('appointment', 'doctor'));
    }

    public function update(Request $request, Appointment $appointment)
    {

        $request->validate([
            'user_name' => 'required',
            'email' => 'email:rfc|required',
            'comments' => 'min:0|max:100'            
        ]);

        $appointment->update([
            'user_id' => Auth::id(),
            'patient_name' => $request->get('user_name'),
            'comments' => $request->get('comments')
        ]);

        Mail::to($request->user_contacts)->send(new NotificationOfAppointment($appointment));

        return redirect()->route('success', [$appointment]);
    }

    public function success($id)
    {
        $appointment = Appointment::find($id);
        $doctor = $appointment->doctor;
        $polyclinic_id = $doctor->polyclinic->id;
        $contacts = $this->contactsService->phoneNumber()[$polyclinic_id - 1];
        return view('appointments.success', compact('appointment', 'doctor', 'contacts'));
    }
}
