<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Company/Index', [
            'companies' => Company::all(),
        ]);
    }

    public function single()
    {
        $id = request()->route('company');
        return Inertia::render('Company/Single', [
            'company' => Company::find($id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Company/Create', [
            'csrf_token' => csrf_token(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'calling_code' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
            'logo' => 'required',
            'category' => 'required',
            'industry' => 'required',
            'size' => 'required',
            'founded' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'street' => 'required',
            'zip' => 'required',
            'trade_license' => 'required'
        ]);

        $Company = new Company();
        $Company->name = $request->name;
        $Company->calling_code = $request->calling_code;
        $Company->phone_number = $request->phone_number;
        $Company->email = $request->email;
        $Company->website = $request->website;
        $Company->description = $request->description;
        $Company->logo = $request->logo;
        $Company->category = $request->category;
        $Company->industry = $request->industry;
        $Company->size = $request->size;
        $Company->founded = $request->founded;
        $Company->country = $request->country;
        $Company->state = $request->state;
        $Company->city = $request->city;
        $Company->street = $request->street;
        $Company->zip = $request->zip;
        $Company->trade_license = $request->trade_license;
        $Company->created_by = auth()->id();

        //dd($Company);

        $Company->save();

        return Inertia::render('Company/Index', [
            'companies' => Company::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
