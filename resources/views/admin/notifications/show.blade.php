@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Notification Details</h2>

    <div class="space-y-4 text-black">
        <div><strong>User:</strong> {{ optional($notification->user)->name ?? 'N/A' }}</div>
        <div><strong>Message:</strong> {{ $notification->message ?? 'No message available' }}</div>
        <div><strong>Seen:</strong> {{ $notification->seen ? 'Yes' : 'No' }}</div>
        <div><strong>Sent at:</strong> {{ $notification->created_at ? $notification->created_at->format('d M Y H:i') : 'N/A' }}</div>
    </div>
</div>
@endsection
