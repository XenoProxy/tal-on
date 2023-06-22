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

        $date = collect(['6 May', '2 May', '26 May']);
        $sorted_date = $date->sort(SORT_NATURAL);

        $times = ["11:00", "15:00"];

        $datetime = "28-1-2011 14:32:55";
        $date = date('Y-m-d', strtotime($datetime));
        $time = date('H:i:s', strtotime($datetime));

        $contacts = $this->contactsService->phoneNumber();
        return view('polyclinics.show', compact(
            'sorted_date', 
            'polyclinic', 
            'polyclinic_doctors', 
            'contacts', 
            'times'
        ));
    }
    
}
