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

    public function show(Polyclinic $polyclinic)
    {
        // врачи текущей поликлиники
        $polyclinic_doctors = Doctor::where('poly_id', $polyclinic->id)->get();

        $appointments_arr = Appointment::all()->toArray();
        //dd($appointments);
        $appointments = json_encode($appointments_arr);

        $date_arr = [];
        for($i = 0; $i <= 14; $i++){
            $date_arr[] = date("Y-m-d", time() + 86400*$i);
        }        

        $time_arr = [];
        for($i = 0; $i <= 20; $i++){
            $time_arr[] = date("H:i:s", 1687939200 + 900*$i);
        }


        $date_time_arr = [];
        for($y = 0; $y <= 14; $y++){  
            for($i = 0; $i <= 20; $i++){
                $date_time_arr[date("Y-m-d", time() + 86400*$y)][] = date("H:i:s", 1687939200 + 900*$i);
            }
        }        

        //dd($date_time_arr);

        $contacts = $this->contactsService->phoneNumber();
        return view('polyclinics.show', compact(
            'appointments',
            'date_time_arr', 
            'polyclinic', 
            'polyclinic_doctors', 
            'contacts', 
        ));
    }
    
}
