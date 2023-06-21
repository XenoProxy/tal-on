<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Polyclinic;
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
        $polyclinic_doctors = Doctor::where('poly_id', $polyclinic->id)
            ->get()
            ->toArray();
        dd($polyclinic_doctors);
        return view('polyclinics.show', compact('polyclinic', 'polyclinic_doctors'));
    }
    
}
