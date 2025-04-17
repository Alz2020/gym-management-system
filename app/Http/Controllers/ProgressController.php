<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // or auth()->user();

        $progress = Progress::where('user_id', $user->id)->get();

        return view('progress.index', compact('progress'));
}
}
