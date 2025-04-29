<?php

namespace App\Http\Controllers\Auth\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('candidat.dashboard', compact('user'));
    }
}
