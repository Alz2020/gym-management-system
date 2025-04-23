<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Payment;

class AdminController extends Controller
{
    public function __construct()
    {
        // Only allow admins to access these routes
        $this->middleware('is_admin');
    }

    // Show dashboard
    public function dashboard()
    {
        $userCount = User::count();
        $appointmentCount = Appointment::count();
        $paymentTotal = Payment::sum('amount');

        return view('admin.dashboard', compact('userCount', 'appointmentCount', 'paymentTotal'));
    }

    // Show users list
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // Show appointments
    public function appointments()
    {
        $appointments = Appointment::with('user')->latest()->paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }

    // Show payments
    public function payments()
    {
        $payments = Payment::with('user')->latest()->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    // Show system settings
    public function settings()
    {
        // Placeholder for actual settings
        return view('admin.settings');
    }
}
