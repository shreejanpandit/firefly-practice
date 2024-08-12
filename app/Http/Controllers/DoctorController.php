<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctor.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        // dd($departments);
        return view('doctor.create', ['departments' => $departments]);
    }

    public function dashboard()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Fetch the doctor record associated with the logged-in user
        $doctor = Doctor::where('user_id', $user->id)->firstOrFail();

        // Fetch appointments related to this doctor
        $appointments = Appointment::where('doctor_id', $doctor->id)->get();

        // Define the current date and time
        $today = now()->startOfDay();
        $tomorrow = now()->addDay()->startOfDay();

        // Initialize arrays for each category of appointments
        $todayAppointments = [];
        $upcomingAppointments = [];
        $previousAppointments = [];

        // Categorize appointments
        foreach ($appointments as $appointment) {
            if ($appointment->date->isSameDay($today)) {
                $todayAppointments[] = $appointment;
            } elseif ($appointment->date->greaterThan($tomorrow)) {
                $upcomingAppointments[] = $appointment;
            } else {
                $previousAppointments[] = $appointment;
            }
        }

        // Pass relevant data to the view
        return view('doctor.dashboard', [
            'doctor' => $doctor,
            'todayAppointments' => $todayAppointments,
            'upcomingAppointments' => $upcomingAppointments,
            'previousAppointments' => $previousAppointments
        ]);
    }



    /**
     */
    public function store(Request $request)
    {
        // dd($request);
        $doctor_validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'contact' => 'required|string|max:15',
            'shift' => 'required|in:day,morning,evening,night',
            'experience' => 'required|integer|max:50',
            'expertise' => 'required|string|max:250',
            'qualification' => 'required|string|max:250',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'department_id' => 'required|exists:departments,id',
        ]);
        unset($doctor_validate["email"]);
        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads_doctor'), $name);
        $doctor_validate['image'] = $name;

        //user created as role doctor
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'doctor',
            'password' => Hash::make('doctor1234'),
        ]);

        event(new Registered($user));
        $doctor_validate["user_id"] = $user->id;

        //doctor createdd with user id
        Doctor::create($doctor_validate);
        return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctor.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
