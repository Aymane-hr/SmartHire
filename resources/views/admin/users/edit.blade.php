@extends('layouts.app') {{-- Or your admin layout --}}

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-medium">Name</label>
                <input type="text" id="name" name="name" class="w-full border-gray-300 rounded mt-1"
                    value="{{ old('name', $user->name) }}" required>
            </div>

            <div>
                <label for="email" class="block font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full border-gray-300 rounded mt-1"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div>
                <label for="role" class="block font-medium">Role</label>
                <select id="role" name="role" class="w-full border-gray-300 rounded mt-1" required>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Candidat</option>
                    <option value="recruiter" {{ $user->role === 'recruiter' ? 'selected' : '' }}>Recruiter</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.users.index') }}"
                    class="mr-4 px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded">Cancel</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Update User</button>
            </div>
        </form>
    </div>
@endsection
