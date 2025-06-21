<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userInfo = UserInfo::where('user_id', auth()->user()->id)->first();
        $jobInfo = Job::find(request()->route('job'));
        return Inertia::render('Job/Application', [
            'csrf_token' => csrf_token(),
            'userInfo' => $userInfo,
            'jobInfo' => $jobInfo,
        ]);
    }

    /**
     * Display a listing of the applicants for a specific job.
     */
    public function applicants(Request $request)
    {
        $jobId = $request->route('job');

        $jobInfo = Job::find($jobId);

        $applicants = JobApplication::join('users', 'job_applications.user_id', '=', 'users.id')
            ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->where('job_id', $jobId)
            ->get();

        return Inertia::render('Job/Applicants', [
            'csrf_token' => csrf_token(),
            'jobInfo' => $jobInfo,
            'applicants' => $applicants,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cover_letter' => 'required|string',
        ]);

        // Check if the user has completed their profile
        $userInfo = UserInfo::where('user_id', auth()->id())->first();
        if (!$userInfo) {
            return redirect()->back()->with('error', 'Please complete your profile before applying for a job.');
        }

        $jobApplication = new JobApplication();
        $jobApplication->user_id = auth()->id();
        $jobApplication->job_id = request()->route('job');
        $jobApplication->cover_letter = $request->cover_letter;
        $jobApplication->save();

        return redirect()->route('job.index')->with('success', 'Job application submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
