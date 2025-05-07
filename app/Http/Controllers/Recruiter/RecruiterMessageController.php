<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruiterMessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('receiver_id', Auth::id())->get();
        return view('recruiter.messages.index', compact('messages'));
    }

    public function create()
    {
        return view('recruiter.messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return redirect()->route('recruiter.messages.index')->with('success', 'Message sent successfully.');
    }

    public function show(Message $message)
    {
        $this->authorize('view', $message);
        return view('recruiter.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $this->authorize('delete', $message);
        $message->delete();

        return redirect()->route('recruiter.messages.index')->with('success', 'Message deleted successfully.');
    }
}
