<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Application;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CandidatJobController extends Controller
{
    /**
     * Display the list of available jobs.
     */
    public function index()
    {
        $jobs = Job::paginate(6);
        return view('candidat.jobs.index', compact('jobs'));
    }

    /**
     * Show the details of a specific job.
     */
    public function show($jobId)
    {
        $job = Job::findOrFail($jobId);
        return view('candidat.jobs.show', compact('job'));
    }

    /**
     * Store a new job application.
     */
    public function storeApplication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_id' => 'required|exists:jobs,id',
            'cover_letter' => 'required|string|max:1000',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Store CV file
        $cvPath = $request->file('cv')->store('cvs', 'public');

        // Save CV
        $cv = Cv::create([
            'user_id' => Auth::id(),
            'file_path' => $cvPath,
            'extracted_text' => null,
            'score' => 0,
            'created_at' => now(),
        ]);

        // Save application
        Application::create([
            'user_id' => Auth::id(),
            'job_id' => $request->job_id,
            'cv_id' => $cv->id,
            'status' => 'pending',
        ]);
        

        return redirect()->route('candidat.jobs.index')
            ->with('success', 'Votre candidature a été envoyée avec succès.');
    }
}
