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

        $available_appointments = [];
        
        $date_arr = []; 

        for($y = 0; $y <= 14; $y++){ 
            $date_arr[] = date("Y-m-d", time() + 86400*$y); 
            for($i = 0; $i <= 20; $i++){
                //$date_time_arr[date("Y-m-d", time() + 86400*$y)][] = date("H:i:s", 1687939200 + 900*$i);
                $available_appointments[] = Appointment::create([
                    "date" => date("Y-m-d", time() + 86400*$y),
                    "time" => date("H:i:s", 1687939200 + 900*$i)
                ]);
            }
        }        

        //dd($available_appointments[0]);

        $contacts = $this->contactsService->phoneNumber();
        return view('polyclinics.show', compact(
            'available_appointments',
            'date_arr', 
            'polyclinic', 
            'polyclinic_doctors', 
            'contacts', 
        ));
    }
    
}
