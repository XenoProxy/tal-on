<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polyclinic;
use App\Services\ContactsService as ContactsService;

class PolyclinicController extends Controller
{    
    protected $contactsService = null;

    public function __construct(ContactsService $contactsService)
    {
        $this->contactsService = $contactsService;
    }

    // public function phoneNumber(Polyclinic $polyclinic) {
    //     $data = $polyclinic->contacts;
    //     $number = "+".substr($data, 0, 3)."(".substr($data, 3, 2).") ".substr($data, 5, 3)." ".substr($data, 8, 2)." ".substr($data, 10, 2);
    //     return $number;
    // }

    public function index()
    {
        //dd($this->phoneNumber(Polyclinic::find(1)));
        $polyclinics = Polyclinic::all();
        //dd($polyclinics);
        //$contacts = array_map('self::phoneNumber', $polyclinic);
        $contacts = $this->contactsService->phoneNumber();
        dd($contacts);
        return view('polyclinics.index', compact('polyclinics', 'contacts'));
    }    

    public function show(Polyclinic $polyclinic)
    {
        return view('polyclinics.show', compact('polyclinic'));
    }
    
}
