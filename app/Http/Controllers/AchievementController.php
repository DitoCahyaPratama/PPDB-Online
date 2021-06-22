<?php

namespace App\Http\Controllers;

use App\Http\Requests\AchievementRequest;
use App\Http\Requests\AchievementUpdateRequest;
use App\Models\Achievement;
use App\Models\Department;
use App\Models\SelectionAchievement;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{

    public function __construct()
    {
        $this->middleware('studentVerify');
        $this->middleware('dateVerifyAchievement');
        $this->middleware('finalVerifyAchievement');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();
        $achievement = Achievement::where('student_id', $student->id)->get();
        $department = Department::all();
        return view('student.achievement', compact(['achievement', 'department']));
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
    public function store(AchievementRequest $request)
    {
        $validated = $request->validated();
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();
        $imagename = $request->file('photo')->store('upload/student/achievement/'.$student->id, 'public');

        $achievement = Achievement::updateOrCreate(array_merge(
            $validated,
            [
                'student_id' => $student->id,
                'name' => $request->name,
                'champion' => $request->champion,
                'year' => $request->year,
                'level' => $request->level,
                'type' => $request->type,
                'photo' => $imagename,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman biodata
        return redirect()->route('student.achievement')
            ->with('success', 'Prestasi berhasil diperbarui');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $achievement = Achievement::find($id)->first();
        return view('student.achievement-edit', compact(['achievement']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(AchievementUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $Authid = Auth::id();
        $student = Student::where(['user_id' => $Authid])->first();

        if(!$request->hasFile('photo')){
            $achievement = Achievement::find($id)->update(array_merge(
                $validated,
                [
                    'student_id' => $student->id,
                    'name' => $request->name,
                    'champion' => $request->champion,
                    'year' => $request->year,
                    'level' => $request->level,
                    'type' => $request->type,
                ],
            ));
        }else{
            $imagename = $request->file('photo')->store('upload/student/achievement/'.$student->id, 'public');

            $achievement = Achievement::find($id)->update(array_merge(
                $validated,
                [
                    'student_id' => $student->id,
                    'name' => $request->name,
                    'champion' => $request->champion,
                    'year' => $request->year,
                    'level' => $request->level,
                    'type' => $request->type,
                    'photo' => $imagename,
                ],
            ));
        }



        //jika data berhasil ditambahkan, akan kembali ke halaman biodata
        return redirect()->route('student.achievement')
            ->with('success', 'Prestasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Achievement::find($id)->delete();
        return redirect()->route('student.achievement')
            -> with('success', 'Prestasi berhasil dihapus');
    }

    public function final(Request $request)
    {
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();
        $biodata = SelectionAchievement::updateOrCreate(array_merge(
            [
                'student_id' => $student->id,
                'achievement_id_1' => $request->achievement_id_1,
                'achievement_id_2' => $request->achievement_id_2,
                'achievement_id_3' => $request->achievement_id_3,
                'department_id' => $request->department_id,
                'status' => 0,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman biodata
        return redirect()->route('dashboard.student')
            ->with('success', 'Prestasi berhasil difinalisasi');
    }
}
