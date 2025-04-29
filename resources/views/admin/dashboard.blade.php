@extends('layouts.admin')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-5">
                <div class="text-gray-500">Total Users</div>
                <div class="text-3xl font-bold">{{ $usersCount }}</div>
            </div>

            <div class="bg-white rounded-lg shadow p-5">
                <div class="text-gray-500">Total Jobs</div>
                <div class="text-3xl font-bold">{{ $jobsCount }}</div>
            </div>

            <div class="bg-white rounded-lg shadow p-5">
                <div class="text-gray-500">Applications</div>
                <div class="text-3xl font-bold">{{ $applicationsCount }}</div>
            </div>

            <div class="bg-white rounded-lg shadow p-5">
                <div class="text-gray-500">Messages</div>
                <div class="text-3xl font-bold">{{ $messagesCount }}</div>
            </div>
        </div>

        <!-- Recent Applications Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-5 border-b">
                <h2 class="text-lg font-semibold">Recent Applications</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Candidate</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Job Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($recentApplications as $application)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $application->candidate->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $application->job->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $application->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $application->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
