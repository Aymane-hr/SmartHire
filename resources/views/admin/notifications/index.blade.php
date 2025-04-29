<!-- resources/views/admin/notifications/index.blade.php -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Notifications</h2>
    </x-slot>

    <div class="py-4">
        <div class="bg-white p-6 rounded shadow">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Title</th>
                        <th class="p-2">Type</th>
                        <th class="p-2">Created At</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notifications as $notification)
                        <tr class="border-b">
                            <td class="p-2">{{ $notification->data['title'] ?? '-' }}</td>
                            <td class="p-2">{{ $notification->type }}</td>
                            <td class="p-2">{{ $notification->created_at->format('d-m-Y H:i') }}</td>
                            <td class="p-2">
                                <a href="{{ route('notifications.show', $notification->id) }}" class="text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $notifications->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
