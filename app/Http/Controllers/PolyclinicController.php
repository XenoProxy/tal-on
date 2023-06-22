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

        // id врачей из текущей поликлиники
        $doctors_id = [];  
        $doctors_id = array_column($polyclinic_doctors->toArray(), 'id');

        // $appointments = Appointment::with('doctor')->get();        
        // $events = [];
        // foreach ($appointments as $appointment) {
        //     $events[] = [
        //         'doctor' => $appointment->doctor->name,
        //         'start' => $appointment->start_time,
        //         'end' => $appointment->finish_time,
        //     ];
        // }

        $date = collect(['6 May', '2 May', '26 May']);
        $sorted_date = $date->sort(SORT_NATURAL);

        $time = ["11:00", "15:00"];

        $contacts = $this->contactsService->phoneNumber();
        return view('polyclinics.show', compact(
            'sorted_date', 
            'polyclinic', 
            'polyclinic_doctors', 
            'contacts', 
            'time'
        ));
    }
    
}
