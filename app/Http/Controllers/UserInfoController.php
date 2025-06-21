<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userInfo = UserInfo::where('user_id', auth()->user()->id)->first();
        return inertia('Profile/Update', [
            'csrf_token' => csrf_token(),
            'userInfo' => $userInfo,
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
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'dob' => 'required|date',
            'calling_code' => 'required|integer',
            'mobile' => 'required|integer|unique:user_infos,mobile,' . auth()->id(),
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'zip' => 'required|integer',
            'present_country' => 'required|string',
            'present_state' => 'required|string',
            'present_city' => 'required|string',
            'present_street' => 'required|string',
            'present_zip' => 'required|integer',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'required|string',
            'marital_status' => 'required|string',
            'blood_group' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'profile_image' => 'nullable|string',
            'resume' => 'nullable|string',
        ]);
        $UserInfo = UserInfo::where('user_id', auth()->user()->id)->first();
        if (!$UserInfo) {
            $UserInfo = new UserInfo;
        }
        $UserInfo->user_id = auth()->user()->id;
        $UserInfo->father_name = $request->father_name;
        $UserInfo->mother_name = $request->mother_name;
        $UserInfo->dob = $request->dob;
        $UserInfo->calling_code = $request->calling_code;
        $UserInfo->mobile = $request->mobile;
        $UserInfo->country = $request->country;
        $UserInfo->state = $request->state;
        $UserInfo->city = $request->city;
        $UserInfo->street = $request->street;
        $UserInfo->zip = $request->zip;
        $UserInfo->present_country = $request->present_country;
        $UserInfo->present_state = $request->present_state;
        $UserInfo->present_city = $request->present_city;
        $UserInfo->present_street = $request->present_street;
        $UserInfo->present_zip = $request->present_zip;
        $UserInfo->gender = $request->gender;
        $UserInfo->nationality = $request->nationality;
        $UserInfo->religion = $request->religion;
        $UserInfo->marital_status = $request->marital_status;
        $UserInfo->blood_group = $request->blood_group;
        $UserInfo->title = $request->title;
        $UserInfo->description = $request->description;
        $UserInfo->profile_image = $request->profile_image;
        $UserInfo->resume = $request->resume;

        $UserInfo->save();

        return redirect()->back()->with([
            'csrf_token' => csrf_token(),
            'userInfo' => $UserInfo,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserInfo $userInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserInfo $userInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserInfo $userInfo)
    {
        //
    }
}
