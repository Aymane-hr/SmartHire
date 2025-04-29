<!-- resources/views/admin/interviews/index.blade.php -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Interviews</h2>
    </x-slot>

    <div class="py-4">
        <div class="bg-white p-6 rounded shadow">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Candidate</th>
                        <th class="p-2">Job Title</th>
                        <th class="p-2">Date</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($interviews as $interview)
                        <tr class="border-b">
                            <td class="p-2">{{ $interview->candidate->name }}</td>
                            <td class="p-2">{{ $interview->job->title }}</td>
                            <td class="p-2">{{ $interview->scheduled_at->format('d-m-Y H:i') }}</td>
                            <td class="p-2">{{ $interview->status }}</td>
                            <td class="p-2">
                                <a href="{{ route('interviews.show', $interview->id) }}" class="text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $interviews->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
