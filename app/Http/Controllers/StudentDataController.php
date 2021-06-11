<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DB;

class StudentDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentData=Student::all();
        return view('admin.pages.student_data_pages',compact('studentData'));
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
        $studentData=DB::table('students')
        ->select('students.*',
        'religions.name AS nameReligion',
        'provinces.name AS nameProvinces',
        'regencies.name AS nameRegencies',
        'districts.name AS nameDistricts',
        'villages.name AS nameVillages')
        ->join('religions','religions.id','=','students.religion_id') 
        ->join('provinces','provinces.id','=','students.province_id')
        ->join('regencies','regencies.id','=','students.regency_id')
        ->join('districts','districts.id','=','students.district_id')
        ->join('villages','villages.id','=','students.village_id')
        ->first();

        return view('admin.pages.student_detail_data_pages',compact('studentData'));
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
