<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $payments = Payment::where('user_id', Auth::id())->latest()->get();
        return view('payments.index', compact('payments'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('payments.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_reference' => 'required|string|unique:payments',
            'status' => 'required|in:Pending,Completed',
        ]);

        Payment::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'payment_reference' => $request->payment_reference,
            'status' => $request->status,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $payment = Payment::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
