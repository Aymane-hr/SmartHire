<?php

namespace App\Http\Controllers\Auth\Candidat;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('user_id', Auth::id())->get();
        return view('candidat.applications.index', compact('applications'));
    }

    public function create()
    {
        return view('candidat.applications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'cover_letter' => 'required|string',
        ]);

        Application::create([
            'user_id' => Auth::id(),
            'job_id' => $request->job_id,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return redirect()->route('candidat.applications.index')->with('success', 'Application submitted successfully.');
    }

    public function show(Application $application)
    {
        $this->authorize('view', $application);
        return view('candidat.applications.show', compact('application'));
    }

    public function edit(Application $application)
    {
        $this->authorize('update', $application);
        return view('candidat.applications.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        $request->validate([
            'cover_letter' => 'required|string',
        ]);

        $application->update([
            'cover_letter' => $request->cover_letter,
        ]);

        return redirect()->route('candidat.applications.index')->with('success', 'Application updated successfully.');
    }

    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);
        $application->delete();

        return redirect()->route('candidat.applications.index')->with('success', 'Application deleted successfully.');
    }
}
