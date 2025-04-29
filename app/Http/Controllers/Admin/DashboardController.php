<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use App\Models\Message;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'jobsCount' => Job::count(),
            'applicationsCount' => Application::count(),
            'messagesCount' => Message::count(),
            'recentApplications' => Application::latest()->take(5)->get(),
        ]);
    }
}

