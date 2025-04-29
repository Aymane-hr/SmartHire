<!-- resources/views/admin/jobs/index.blade.php -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Jobs</h2>
    </x-slot>

    <div class="py-4">
        <div class="bg-white p-6 rounded shadow">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Title</th>
                        <th class="p-2">Company</th>
                        <th class="p-2">Location</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                        <tr class="border-b">
                            <td class="p-2">{{ $job->title }}</td>
                            <td class="p-2">{{ $job->company->name }}</td>
                            <td class="p-2">{{ $job->location }}</td>
                            <td class="p-2">{{ $job->status }}</td>
                            <td class="p-2">
                                <a href="{{ route('jobs.edit', $job->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
