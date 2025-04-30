<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CandidatDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('candidat.dashboard', compact('user'));
    }
}
