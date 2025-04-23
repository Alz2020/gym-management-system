<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::user()?->hasRole('admin')) {
            return redirect('/dashboard')->with('error', 'Access Denied.');
        }

        return view('admin.dashboard');
    }
}
