<?php

namespace App\Http\Controllers;

use App\Models\Health;
use App\Models\SchoolOrigin;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthController extends Controller
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
        $health = Health::where(['student_id' => $student->id])->first();
        return view('student.health', compact(['health']));
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
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();
        $imagename = $request->file('photo')->store('upload/student/skl', 'public');
        $health = Health::updateOrCreate(['student_id' => $student->id], array_merge(
            [
                'student_id' => $student->id,
                'photo' => $imagename,
                'status' => 0,
            ],
        ));
        //jika data berhasil ditambahkan, akan kembali ke halaman biodata
        return redirect()->route('student.health')
            ->with('success', 'Scan Data Kesehatan berhasil diperbarui');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function show(Health $health)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function edit(Health $health)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Health $health)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function destroy(Health $health)
    {
        //
    }
}
