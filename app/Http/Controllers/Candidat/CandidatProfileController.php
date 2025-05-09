<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CandidatProfileController extends Controller
{
    public function index()
    {
        return view('candidat.profile.index');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'confirm_password' => 'required_with:password|same:password',
            'avatar' => 'nullable|image|max:2048',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'bio' => 'nullable|string|max:500',
            'skills' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'bio' => $request->bio,
            'skills' => $request->skills,
            'education' => $request->education,
            'experience' => $request->experience,
        ];

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('avatars'), $avatarName);
            $data['avatar'] = $avatarName;
        }

        // Handle password update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }
}
