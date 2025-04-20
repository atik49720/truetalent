<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Job/Index', [
            'jobs' => Job::all(),
        ]);
    }

    public function single()
    {
        $id = request()->route('job');
        return Inertia::render('Job/Single', [
            'csrf_token' => csrf_token(),
            'job' => Job::find($id),
        ]);
    }

    public function companyWiseJobs()
    {
        $companyId = request()->route('company');
        $jobs = Job::where('company_id', $companyId)->get();
        $company = Company::find($companyId);
        return Inertia::render('Job/CompanyWise', [
            'csrf_token' => csrf_token(),
            'jobs' => $jobs,
            'company' => $company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Job/Create', [
            'csrf_token' => csrf_token(),
            'companies' => Company::all()->where('verification_status', 'verified')->select('id', 'name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'currency' => 'required',
            'type' => 'required',
            'shift' => 'required',
            'working_exp_year' => 'required',
            'working_hours' => 'required',
            'vacancies' => 'required',
            'deadline' => 'required',
            'qualification' => 'required',
            'skills' => 'required',
            'responsibilities' => 'required',
            'benefits' => 'required',
        ]);

        $Job = new Job();
        $Job->company_id = $request->company_id;
        $Job->title = $request->title;
        $Job->description = $request->description;
        $Job->category = $request->category;
        $Job->location = $request->location;
        $Job->salary = $request->salary;
        $Job->currency = $request->currency;
        $Job->type = $request->type;
        $Job->shift = $request->shift;
        $Job->working_exp_year = $request->working_exp_year;
        $Job->working_hours = $request->working_hours;
        $Job->vacancies = $request->vacancies;
        $Job->deadline = $request->deadline;
        $Job->qualification = $request->qualification;
        $Job->skills = $request->skills;
        $Job->responsibilities = $request->responsibilities;
        $Job->benefits = $request->benefits;
        $Job->created_by = auth()->user()->id;

        $Job->save();

        return Inertia::render('Job/Index', [
            'jobs' => Job::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
