<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('recipient_id', Auth::id())->get();
        return view('candidat.messages.index', compact('messages'));
    }

    public function create()
    {
        return view('candidat.messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $request->recipient_id,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return redirect()->route('candidat.messages.index')->with('success', 'Message sent successfully.');
    }

    public function show(Message $message)
    {
        $this->authorize('view', $message);
        return view('candidat.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $this->authorize('delete', $message);
        $message->delete();

        return redirect()->route('candidat.messages.index')->with('success', 'Message deleted successfully.');
    }
}
