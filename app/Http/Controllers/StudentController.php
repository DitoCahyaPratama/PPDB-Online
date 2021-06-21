<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Religion;
use App\Models\Student;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BiodataRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $email = Auth::user()->email;
        $student = Student::where(['user_id' => $id])->first();
        $provinces = Province::all();
        $religions = Religion::all();
        $studentReligion = $student ? Religion::find($student->religion_id) : "";
        $studentVillage = $student ? Village::find($student->village_id) : "";
        $studentDistrict = $student ? District::find($student->district_id) : "";
        $studentRegency = $student ? Regency::find($student->regency_id) : "";
        $studentProvince = $student ? Province::find($student->province_id) : "";
        return view('student.biodata', compact(['student', 'provinces', 'religions', 'studentReligion', 'studentVillage', 'studentDistrict', 'studentRegency', 'studentProvince', 'email']));
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
    public function store(BiodataRequest $request)
    {
        $validated = $request->validated();

        $biodata = Student::updateOrCreate(['email' => $request->email], array_merge(
            $validated,
            [
                'nisn' => $request->nisn,
                'name' => $request->name,
//                'email' => $request->email,
                'address' => $request->address,
                'nik' => $request->nik,
                'place_born' => $request->place_born,
                'date_born' => $request->date_born,
                'gender' => $request->gender,
                'religion_id' => $request->religion_id,
                'regency_id' => $request->regency_id,
                'village_id' => $request->village_id,
                'district_id' => $request->district_id,
                'province_id' => $request->province_id,
                'phone_number' => $request->phone_number,
                'user_id' => Auth::id(),
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman biodata
        return redirect()->route('student.biodata')
            ->with('success', 'Biodata berhasil diperbarui');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function uploadPhoto(Request $request){
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();
        $imagename = $request->file('photo')->store('upload/student/profile', 'public');
        $biodata = Student::find($student->id)->update(array_merge(
            [
                'photo' => $imagename,
            ],
        ));
        //jika data berhasil ditambahkan, akan kembali ke halaman biodata
        return redirect()->route('student.biodata')
            ->with('success', 'Photo profile berhasil diperbarui');
    }

    public function cetak_pendaftaran(){

    }

    public function cetak_penerimaan(){

    }
}
