<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('sender')->latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::with('sender')->findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }
}
