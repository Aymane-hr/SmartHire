<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatProfileController extends Controller
{
    /**
     * Display listing of all candidates
     */
    public function index()
    {
        $user = Auth::user()->load(['skills', 'cvs.skills', 'matches.job']);

        return view('candidat.profile.index', [
            'user' => $user,
            'skills' => $user->skills->unique(),
            'latestCv' => $user->cvs->first(),
            'matches' => $user->matches
        ]);
    }
    /**
     * Display authenticated candidate's profile
     */
    public function show()
    {
        $user = Auth::user()->load([
            'cvs' => function ($query) {
                $query->latest()->with('skills');
            },
            'matches.job'
        ]);

        if (!$user) {
            abort(403, 'Unauthorized access');
        }

        return view('candidat.profile.show', [
            'user' => $user,
            'skills' => $user->skills->unique(),
            'latestCv' => $user->cvs->first(),
            'matches' => $user->matches
        ]);
    }

    /**
     * Show the form for editing the profile
     */
    public function edit()
    {
        $user = Auth::user();
        return view('candidat.profile.edit', [
            'user' => $user,
            'skills' => Skill::all(),
            'userSkills' => $user->skills->pluck('id')->toArray()
        ]);
    }

    /**
     * Update the user profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id'
        ]);

        $user->update($validated);

        if ($request->has('skills') && $user->latestCv) {
            $user->latestCv->skills()->sync($validated['skills']);
        }

        return redirect()->route('candidat.profile.show')
            ->with('success', 'Profile updated successfully');
    }
}
