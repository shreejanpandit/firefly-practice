<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve counts for dashboard statistics


        // Get the currently authenticated user
        $user = Auth::user();

        // Debug output to verify the user role
        // dd($user->role);
        // dd($user->role, $user->hasRole('admin'), $user->hasRole('doctor'), $user->hasRole('patient'));
        // Check user's role and redirect to the appropriate dashboard
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('doctor')) {
            return redirect()->route('doctor.dashboard');
        } elseif ($user->hasRole('patient')) {
            return redirect()->route('patient.dashboard');
        }

        return abort(403, 'Unauthorized');
    }
}
