<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use Illuminate\Http\Request;

class AdminInterviewController extends Controller
{
    // Display a paginated list of interviews
    public function index()
    {
        $interviews = Interview::with(['application.user', 'application.job'])->paginate(10);


        return view('admin.interviews.index', compact('interviews'));
    }

    // Show details for a specific interview
    public function show($id)
    {
        $interview = Interview::with('application.user', 'application.job')->findOrFail($id);

        return view('admin.interviews.show', compact('interview'));
    }

    // (Optional) Create new interview form
    public function create()
    {
        // Load necessary data like users and jobs
        // return view('admin.interviews.create', [...]);
    }

    // (Optional) Store interview in database
    public function store(Request $request)
    {
        // $request->validate([...]);

        // Interview::create([...]);

        // return redirect()->route('admin.interviews.index')->with('success', 'Interview created.');
    }

    // (Optional) Edit interview form
    public function edit($id)
    {
        // $interview = Interview::findOrFail($id);
        // return view('admin.interviews.edit', compact('interview'));
    }

    // (Optional) Update interview in database
    public function update(Request $request, $id)
    {
        // $request->validate([...]);
        // $interview = Interview::findOrFail($id);
        // $interview->update([...]);

        // return redirect()->route('admin.interviews.index')->with('success', 'Interview updated.');
    }

    // (Optional) Delete interview
    public function destroy($id)
    {
        $interview = Interview::findOrFail($id);
        $interview->delete();

        return redirect()->route('admin.interviews.index')->with('success', 'Interview deleted.');
    }
}
