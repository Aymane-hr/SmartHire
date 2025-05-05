@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Interview Details</h2>

    <div class="space-y-4">
        <div><strong>Candidate:</strong> {{ $interview->application->user->name }}</div>
        <div><strong>Job Title:</strong> {{ $interview->application->job->title }}</div>
        <div><strong>Interview Date:</strong> {{ $interview->interview_date->format('d M Y H:i') }}</div>
        <div><strong>Zoom Link:</strong> <a href="{{ $interview->zoom_link }}" target="_blank" class="text-blue-600 underline">Join Meeting</a></div>
    </div>
</div>
@endsection
