<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('client', 'trainer')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $clients = User::where('role', 'member')->get();
        $trainers = User::where('role', 'trainer')->get();
        return view('appointments.create', compact('clients', 'trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:users,id',
            'trainer_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully!');
    }

    public function edit(Appointment $appointment)
    {
        $clients = User::where('role', 'member')->get();
        $trainers = User::where('role', 'trainer')->get();
        return view('appointments.edit', compact('appointment', 'clients', 'trainers'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'client_id' => 'required|exists:users,id',
            'trainer_id' => 'required|exists:users,id',
            'date' => 'required|date',
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

