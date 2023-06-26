<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;

class AppointmentController extends Controller
{
    protected $appointment = null;

    public function getDoctor(Request $request)
    {
        $this->appointment = $request->all();
        echo json_encode($this->appointment);
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
        //dd($this->appointment);
        echo json_encode($this->appointment);
 
        return view('appointments.index');
    }
}
