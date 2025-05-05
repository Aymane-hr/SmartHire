<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class RecruiterApplicationController extends Controller
{
    public function index()
    {
        $statuses = ['accepted', 'pending', 'rejected'];
        $statusCounts = [];

        foreach ($statuses as $status) {
            $statusCounts[$status] = Application::where('status', $status)->count();
        }

        $statusCounts['all'] = Application::count();

        $currentStatus = request()->query('status', 'all');

        $query = Application::with(['user', 'job']);

        if ($currentStatus !== 'all') {
            $query->where('status', $currentStatus);
        }

        $applications = $query->paginate(10);

        return view('recruiter.applications.index', [
            'applications' => $applications,
            'statusCounts' => $statusCounts,
            'currentStatus' => $currentStatus,
        ]);
    }

    public function show($id)
    {
        $application = Application::with('candidate', 'job')->findOrFail($id);
        return view('recruiter.applications.show', compact('application'));
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

        return redirect()->route('recruiter.applications.index')->with('success', 'Application deleted successfully.');
    }
}
