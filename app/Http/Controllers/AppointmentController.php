<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Models\Appointment;

class AppointmentController extends Controller
{
    protected $appointment = null;

    public function getDoctor(Request $request)
    {
        $this->appointment = $request->all();
        $data = json_encode($this->appointment);
        return view('appointments.index');
    }

    public function index()
    {
        // $events = [];
 
        // $appointments = Appointment::with(['user', 'doctor'])->get();
 
        // foreach ($appointments as $appointment) {
        //     $events[] = [
        //         'title' => $appointment->user->name . ' ('.$appointment->doctor->name.')',
        //         'start' => $appointment->start_time,
        //         'end' => $appointment->finish_time,
        //     ];
        // }
        //echo json_encode($this->appointment);
        
        $data = json_encode($this->appointment);
        //return view('appointments.index');
    }
}
