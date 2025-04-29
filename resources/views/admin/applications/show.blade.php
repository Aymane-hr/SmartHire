@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Application Details</h2>

    <div class="space-y-4">
        <div><strong>Candidate:</strong> {{ $application->candidate->name }}</div>
        <div><strong>Email:</strong> {{ $application->candidate->email }}</div>
        <div><strong>Job Title:</strong> {{ $application->job->title }}</div>
        <div><strong>Status:</strong> <span class="capitalize">{{ $application->status }}</span></div>
        <div><strong>Applied at:</strong> {{ $application->created_at->format('d M Y H:i') }}</div>
    </div>

    <div class="mt-6">
        <form method="POST" action="{{ route('applications.updateStatus', $application->id) }}">
            @csrf
            <label for="status" class="block font-medium">Update Status:</label>
            <select name="status" id="status" class="mt-1 block w-full rounded-md shadow-sm">
                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>

            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Status
            </button>
        </form>
    </div>
</div>
@endsection
