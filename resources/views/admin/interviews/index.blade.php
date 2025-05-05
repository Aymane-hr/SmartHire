@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Interviews</h2>

    <div class="bg-white p-6 rounded shadow">
        <table class="w-full text-sm text-left border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Candidate</th>
                    <th class="p-2 border">Job Title</th>
                    <th class="p-2 border">Interview Date</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($interviews as $interview)
                    <tr class="border-b">
                        <td class="p-2 border">{{ optional($interview->user)->name }}</td>
                        <td class="p-2 border">{{ optional($interview->job)->title }}</td>
                        <td class="p-2 border">{{ $interview->interview_date->format('d-m-Y H:i') }}</td>
                        <td class="p-2 border">{{ ucfirst($interview->status) }}</td>
                        <td class="p-2 border">
                            <a href="{{ route('interviews.show', $interview->id) }}" class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">No interviews found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $interviews->links() }}
        </div>
    </div>
</div>
@endsection
