<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patient.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $patient_validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'contact' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'dob' => 'date|before:today',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // dd($request->image);
        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads.patient'), $name);

        // Assuming $request->dob is in 'YYYY-MM-DD' format
        $dob = $request->dob;

        // Create DateTime objects for DOB and the current date
        $dobDateTime = new DateTime($dob);
        $currentDateTime = new DateTime();

        // Calculate the age
        $age = $currentDateTime->diff($dobDateTime)->y;

        // Insert the age into the $patient_validate array
        $patient_validate["age"] = $age;

        $patient_validate['image'] = $name;
        Patient::create($patient_validate);

        return redirect()->route('patient.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
