@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Message Details</h2>

    <div class="space-y-4">
        <div><strong>From:</strong> {{ $message->sender->name }} ({{ $message->sender->email }})</div>
        <div><strong>To:</strong> {{ $message->receiver->name }} ({{ $message->receiver->email }})</div>
        <div><strong>Sent at:</strong> {{ $message->sent_at->format('d M Y H:i') }}</div>
        <div><strong>Content:</strong></div>
        <p class="mt-2 p-4 bg-gray-100 rounded">{{ $message->content }}</p>
    </div>
</div>
@endsection
