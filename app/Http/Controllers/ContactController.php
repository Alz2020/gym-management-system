<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;


class ContactController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $contacts = Contact::where('user_id', $user->id)->get();

        return view('contact.index',compact('contacts'));
    }
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create new contact entry
        Contact::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        
        return redirect()->back()->with('success', 'Message sent successfully!');

    }

}
