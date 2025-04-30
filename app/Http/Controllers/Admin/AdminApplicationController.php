<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with('candidate', 'job')->latest()->paginate(10);
        return view('admin.applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = Application::with('candidate', 'job')->findOrFail($id);
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $application = Application::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
