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

        $date_arr = [];
        //$current_date = date("d F Y");
        for($i = 0; $i <= 14; $i++){
            $date_arr[] = date("Y-m-d", time() + 86400*$i);
        }

        //dd(strtotime('08:00')); // 1687939200
        //dd(date('H:i', 1687939200+900)); // 08:15

        $time_arr = [];
        //$current_time = date("H:i");
        for($i = 0; $i <= 20; $i++){
            $time_arr[] = date("H:i", 1687939200 + 900*$i);
        }

        $contacts = $this->contactsService->phoneNumber();
        return view('polyclinics.show', compact(
            'date_arr', 
            'polyclinic', 
            'polyclinic_doctors', 
            'contacts', 
            'time_arr'
        ));
    }
    
}
