<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ConsultingController extends Controller
{
    //
    public function index()
    {

        return view('consulting.index');
    }

}
