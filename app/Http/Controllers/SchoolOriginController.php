<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Religion;
use App\Models\SchoolOrigin;
use App\Models\Student;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolOriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();
        $schoolorigin = SchoolOrigin::where(['student_id' => $student->id])->first();
        $provinces = Province::all();
        $schooloriginVillage = Village::find($schoolorigin->village_id);
        $schooloriginDistrict = District::find($schoolorigin->district_id);
        $schooloriginRegency = Regency::find($schoolorigin->regency_id);
        $schooloriginProvince = Province::find($schoolorigin->province_id);
        return view('student.schoolOrigin', compact(['schoolorigin', 'provinces', 'schooloriginVillage', 'schooloriginDistrict', 'schooloriginRegency', 'schooloriginProvince']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
