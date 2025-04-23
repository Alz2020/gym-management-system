<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('client', 'trainer')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $clients = User::where('role', 'client')->get();
        $trainers = User::where('role', 'trainer')->get();

        return view('appointments.create', compact('clients', 'trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'appointment_date' => 'required|date',
            'time' => 'required',
        ]);

        $appointmentDateTime = $request->date . ' ' . $request->time;

        Appointment::create([
            'client_name' => $request->client_name,
            'phone_number' => $request->phone_number,
            'appointment_date' => $appointmentDateTime,
            'status' => 'scheduled',
        ]);


        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully!');
    }

    public function edit(Appointment $appointment)
    {
        $clients = User::where('is_admin',0)->get();
        $trainers = User::where('is_trainer',1)->get();
        return view('appointments.edit', compact('appointment', 'clients', 'trainers'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'appointment_date' => 'required|date',
            'time' => 'required',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully!');
    }
}

