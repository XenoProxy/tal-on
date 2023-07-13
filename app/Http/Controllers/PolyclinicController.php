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

        $isAdmin = false;
        if(auth()->id() == 1) {
            $isAdmin = true;
        }

        return view('polyclinics.index', compact('polyclinics', 'contacts', 'isAdmin'));
    }    

    public function show(Polyclinic $polyclinic)
    {
        // врачи текущей поликлиники
        $polyclinic_doctors = Doctor::where('poly_id', $polyclinic->id)->get();
        $appointments = Appointment::all();
        $date_time_arr = [];

        for($y = 0; $y <= 14; $y++){ 
            foreach($polyclinic_doctors as $doctor){
                for($i = 0; $i <= 20; $i++){
                    $date_time_arr[date("Y-m-d", time() + 86400*$y)][$doctor->id][] = date("H:i:s", 1687939200 + 900*$i);
                }
            }
        }        

        foreach($appointments as $appointment){
            $date = $appointment->date;
            $doctor = $appointment->doctor_id;
            $time = $appointment->time;

            if(in_array($date, array_keys($date_time_arr))){
                if(in_array($doctor, array_keys($date_time_arr[$date]))){
                    if(in_array($time, $date_time_arr[$date][$doctor])){
                        $time_id = array_search($time, $date_time_arr[$date][$doctor]);
                        unset($date_time_arr[$date][$doctor][$time_id]); 
                    }
                }                
            }    
        }

        

        $contacts = $this->contactsService->phoneNumber();
        return view('polyclinics.show', compact(
            'date_time_arr', 
            'polyclinic', 
            'polyclinic_doctors', 
            'contacts', 
        ));
    }
    
}
