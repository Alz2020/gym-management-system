<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;


class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $memberships = Membership::paginate(10);
        return view('admin.memberships.index', 
        compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('memberships.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);
        Membership::create($request->all());
        return redirect()->route('memberships.index')->with('success',
    'Membership created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $membership = Membership::findOrFail($id);
        return view('memberships.show', compact('membership'));
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
