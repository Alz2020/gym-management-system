<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', ['user' => Auth::user()]);

        
        if ($user->role == 'admin') {
            return redirect()->route('admin-dashboard');
        } elseif ($user->role == 'trainer') {
            return redirect()->route('trainer-dashboard');
        } else {
            return redirect()->route('member-dashboard');
        }
    }

    public function admin()
    {
        return view('dashboard.admin');
    }

    public function trainer()
    {
        return view('dashboard.trainer');
    }

    public function member()
    {
        return view('dashboard.member');
    }
    //
}
