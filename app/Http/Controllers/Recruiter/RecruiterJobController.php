<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruiterJobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('user')->latest()->paginate(10);
        return view('recruiter.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('recruiter.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,closed,pending',
        ]);

        $job = new Job($request->all());
        $job->user_id = auth()->id(); // Assuming the recruiter is logged in
        $job->save();

        return redirect()->route('recruiter.jobs.index')->with('success', 'Job created successfully.');
    }

    public function show($id)
    {
        $job = Job::with('user')->findOrFail($id);
        return view('recruiter.jobs.show', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('recruiter.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,closed,pending',
        ]);

        $job->update($request->all());

        return redirect()->route('recruiter.jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('recruiter.jobs.index')->with('success', 'Job deleted successfully.');
    }
}
