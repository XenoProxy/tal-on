<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Polyclinic;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        $isAdmin = false;
        if(auth()->id() == 1) {
            $isAdmin = true;
        }

        return view('doctors.index', compact('doctors', 'isAdmin'));
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required',
            'field' => 'required',
            'office' => 'required' 
        ]);

        $doctor->update($request->all());

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }

    public function show(Doctor $doctor)
    {
        $polyclinic_name = $doctor->polyclinic->name;
        return view('doctors.show', compact('doctor', 'polyclinic_name'));
    }
}
