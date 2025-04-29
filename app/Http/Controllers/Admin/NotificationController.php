<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = DatabaseNotification::latest()->paginate(10);
        return view('admin.notifications.index', compact('notifications'));
    }

    public function show($id)
    {
        $notification = DatabaseNotification::findOrFail($id);
        return view('admin.notifications.show', compact('notification'));
    }
}
