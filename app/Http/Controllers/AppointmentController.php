<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $department = Department::with(['doctors'])->get();
        return view('appointment.create', ["patients" => $patients, "doctors" => $doctors, "departments" => $department]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $appointment_validate = $request->validate([
            "patient_id" => "required|integer|exists:patients,id",
            // "department_id" => "required|integer|exists:departments,id",
            "doctor_id" => "required|integer|exists:doctors,id",
            "number" => "required|string|max:10",
            "description" => "nullable|string|max:255",
            "type" => "required|string|in:physical,virtual",
            "status" => "required|string|in:active,inactive,pending",
            "location" => "required|string|max:255",
            "date" => "required|date|after_or_equal:today",
            "time" => "required|date_format:H:i"
        ]);
        Appointment::create($appointment_validate);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function doctorIndex()
    {
        // $doctors_appointment = Appointment::all();
        $doctors_appointment = Appointment::with(['doctor', 'patient'])->get();
        return view('appointment.doctor', ['doctors_appointment' => $doctors_appointment]);
        // return "hello";
    }
}
