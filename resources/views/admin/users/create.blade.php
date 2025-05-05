@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-black mb-6">Create New User</h1>

    @if ($errors->any())
        <div class="bg-red-600 text-white p-4 rounded mb-4">
            <strong>There were some problems with your input.</strong>
            <ul class="list-disc ml-6 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" class="bg-blue shadow rounded p-6 space-y-4 text-white">
        @csrf

        <div>
            <label for="name" class="block font-medium">Name</label>
            <input type="text" name="name" id="name" required
                   class="w-full border border-gray-300 rounded px-3 py-2 mt-1 text-black"
                   value="{{ old('name') }}">
        </div>

        <div>
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" required
                   class="w-full border border-gray-300 rounded px-3 py-2 mt-1 text-black"
                   value="{{ old('email') }}">
        </div>

        <div>
            <label for="password" class="block font-medium">Password</label>
            <input type="password" name="password" id="password" required
                   class="w-full border border-gray-300 rounded px-3 py-2 mt-1 text-black">
        </div>

        <div>
            <label for="password_confirmation" class="block font-medium">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   class="w-full border border-gray-300 rounded px-3 py-2 mt-1 text-black">
        </div>

        <div>
            <label for="role" class="block font-medium">Role</label>
            <select name="role" id="role"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1 text-black">
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Candidat</option>
                <option value="recruiter" {{ old('role') == 'recruiter' ? 'selected' : '' }}>Recruiter</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="flex justify-between mt-6">
            <button type="submit" class="btn btn-primary">Create User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection
