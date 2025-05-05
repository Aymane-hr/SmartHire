<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use Illuminate\Http\Request;

class AdminInterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::with('user', 'job')->latest()->paginate(10);
        return view('admin.interviews.index', compact('interviews'));
    }

    public function show($id)
    {
        $interview = Interview::with('user', 'job')->findOrFail($id);
        return view('admin.interviews.show', compact('interview'));
    }
}
