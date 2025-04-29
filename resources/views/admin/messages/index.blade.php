<!-- resources/views/admin/messages/index.blade.php -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Messages</h2>
    </x-slot>

    <div class="py-4">
        <div class="bg-white p-6 rounded shadow">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Sender</th>
                        <th class="p-2">Subject</th>
                        <th class="p-2">Received At</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr class="border-b">
                            <td class="p-2">{{ $message->sender->name }}</td>
                            <td class="p-2">{{ $message->subject }}</td>
                            <td class="p-2">{{ $message->created_at->format('d-m-Y H:i') }}</td>
                            <td class="p-2">
                                <a href="{{ route('messages.show', $message->id) }}" class="text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
