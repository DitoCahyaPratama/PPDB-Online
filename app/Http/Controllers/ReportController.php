<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Achievement;
use App\Models\Department;
use App\Models\Report;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
        $report = Report::where('student_id', $student->id)->first();
        $department = Department::all();
        return view('student.report', compact(['report', 'department']));
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
    public function store(ReportRequest $request)
    {
        $validated = $request->validated();
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();

        $report = Report::updateOrCreate(['student_id' => $student->id],array_merge(
            $validated,
            [
                'agama' => $request->agama,
                'pkn' => $request->pkn,
                'bi' => $request->bi,
                'mtk' => $request->mtk,
                'ipa' => $request->ipa,
                'ips' => $request->ips,
                'bing' => $request->bing,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman biodata
        return redirect()->route('student.report')
            ->with('success', 'Raport berhasil diperbarui');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
