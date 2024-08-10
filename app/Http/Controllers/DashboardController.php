<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_patient = Patient::count();
        $total_doctor = Doctor::count();
        $total_appointment = Appointment::count();
        // dd($total_patient, $total_doctor, $total_appointment);
        $data_count = ['total_patient' => $total_patient, 'total_doctor' => $total_doctor, 'total_appointment' => $total_appointment];
        return view('dashboard', $data_count);
    }
}
