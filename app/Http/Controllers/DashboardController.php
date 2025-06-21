<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $user = auth()->user();

        // Fetch the companies created by the authenticated user
        $companies = Company::where('created_by', $user->id)->get();

        // Fetch the created jobs by the authenticated user
        $hiringJobs = Job::join('companies', 'jobs.company_id', '=', 'companies.id')
            ->select('jobs.*', 'companies.name as company_name')
            ->where('jobs.created_by', $user->id)
            ->where('status', 'hiring')
            ->get();

        // Fetch the job applications submitted by the authenticated user
        $jobApplications = JobApplication::join('jobs', 'job_applications.job_id', '=', 'jobs.id')
            ->join('companies', 'jobs.company_id', '=', 'companies.id')
            ->select('job_applications.*', 'jobs.title as job_title', 'companies.name as company_name')
            ->where('user_id', $user->id)
            ->get();

        return inertia('Dashboard', [
            'csrf_token' => csrf_token(),
            'companies' => $companies,
            'hiringJobs' => $hiringJobs,
            'jobApplications' => $jobApplications,
        ]);
    }
}
