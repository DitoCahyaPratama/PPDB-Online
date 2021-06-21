<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolOriginRequest;
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
        $schooloriginVillage = $schoolorigin ? Village::find($schoolorigin->village_id) : "";
        $schooloriginDistrict = $schoolorigin ? District::find($schoolorigin->district_id) : "";
        $schooloriginRegency = $schoolorigin ? Regency::find($schoolorigin->regency_id) : "";
        $schooloriginProvince = $schoolorigin ? Province::find($schoolorigin->province_id) : "";
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
    public function store(SchoolOriginRequest $request)
    {
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();
        $validated = $request->validated();
        $schoolOrigin = SchoolOrigin::updateOrCreate(['student_id' => $student->id], array_merge(
            $validated,
            [
                'student_id' => $student->id,
                'name' => $request->name,
                'address' => $request->address,
                'graduation_year' => $request->graduation_year,
                'village_id' => $request->village_id,
                'district_id' => $request->district_id,
                'regency_id' => $request->regency_id,
                'province_id' => $request->province_id,
                'type' => $request->type,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman biodata
        return redirect()->route('student.schoolorigin')
            ->with('success', 'Sekolah asal berhasil diperbarui');
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

    public function uploadSkl(Request $request){
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();
        $imagename = $request->file('photo')->store('upload/student/skl', 'public');
        $schoolorigin = SchoolOrigin::where('student_id', $student->id)->update(array_merge(
            [
                'photo' => $imagename,
            ],
        ));
        //jika data berhasil ditambahkan, akan kembali ke halaman biodata
        return redirect()->route('student.schoolorigin')
            ->with('success', 'Scan SKL berhasil diperbarui');
    }
}
