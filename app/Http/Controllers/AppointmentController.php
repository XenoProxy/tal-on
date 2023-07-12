<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Models\Appointment;
use App\Models\User;
use App\Mail\NotificationOfAppointment;
use Illuminate\Support\Facades\Mail;

use App\Services\Appointments\LimitationService as LimitationService;
use App\Services\Polyclinics\ContactsService as ContactsService;

class AppointmentController extends Controller
{
    protected $contactsService = null;
    protected $limitationService = null;

    public function __construct(ContactsService $contactsService, LimitationService $limitationService)
    {
        $this->contactsService = $contactsService;
        $this->limitationService = $limitationService;
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

        dd($this->limitationService->appointmentLimit($doctor->id, $appointment->date));

        return view('appointments.edit', compact('appointment', 'doctor'));
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

        $appointment->update([
            'user_id' => $user_id,
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
