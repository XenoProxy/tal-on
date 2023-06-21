<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Polyclinic;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Services\Polyclinics\ContactsService as ContactsService;

class PolyclinicController extends Controller
{    
    protected $contactsService = null;

    public function __construct(ContactsService $contactsService)
    {
        $this->contactsService = $contactsService;
    }

    public function index()
    {
        $polyclinics = Polyclinic::all();
        $contacts = $this->contactsService->phoneNumber();
        return view('polyclinics.index', compact('polyclinics', 'contacts'));
    }    

    public function show(Polyclinic $polyclinic, Appointment $appointments)
    {
        // врачи текущей поликлиники
        $polyclinic_doctors = Doctor::where('poly_id', $polyclinic->id)->get();
        //dd($polyclinic_doctors->toArray());



        $doctors_id = [];
        foreach($polyclinic_doctors as $doctor){
            $doctors_id = $doctor["id"];
        }
        //dd($doctors_id);

        $appointments = Appointment::with('doctor')->get();        
        $events = [];
        foreach ($appointments as $appointment) {
            $events[] = [
                'doctor' => $appointment->doctor->name,
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        }


        

        $time = ["11:00", "15:00"];

        //dd($polyclinic_doctors->toArray());
        $contacts = $this->contactsService->phoneNumber();
        return view('polyclinics.show', compact('polyclinic', 'polyclinic_doctors', 'contacts', 'time'));
    }
    
}
