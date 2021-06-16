<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectionAchievement;
use DB;

class SelectionAchievementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($depId)
    {
        $departement = "";
        if ($depId == 1) {
            $departement = 'Teknik Komputer Jaringan';
        }else if ($depId == 2) {
            $departement = 'Rekayasa Perangkat Lunak';
        }elseif ($depId == 3) {
            $departement = 'Teknik Mekatronika';
        }else {
            $departement = 'Teknik Elektronika Industri';
        }
        $achievData=DB::table('selection_achievements')
        ->select(
        'selection_achievements.*',
        'achievements1.name AS achievements1',
        'achievements2.name AS achievements2',
        'achievements3.name AS achievements3',
        'students.name AS nameStudents')
        ->join('achievements AS achievements1','achievements1.id','=','selection_achievements.achievement_id_1')
        ->join('achievements AS achievements2','achievements2.id','=','selection_achievements.achievement_id_2')
        ->join('achievements AS achievements3','achievements3.id','=','selection_achievements.achievement_id_3')
        ->join('students','students.id','=','selection_achievements.student_id')
        ->where('department_id','=',$depId)
        ->get();
        return view('admin.pages.selection_achievement_pages',compact('departement','achievData'));
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
        $achievData=DB::table('selection_achievements')
        ->select(
        'selection_achievements.*',
        'achievements1.name AS achievements1','achievements1.photo AS achievementsPhoto1',
        'achievements2.name AS achievements2','achievements2.photo AS achievementsPhoto2',
        'achievements3.name AS achievements3','achievements3.photo AS achievementsPhoto3',
        'students.name AS nameStudents')
        ->join('achievements AS achievements1','achievements1.id','=','selection_achievements.achievement_id_1')
        ->join('achievements AS achievements2','achievements2.id','=','selection_achievements.achievement_id_2')
        ->join('achievements AS achievements3','achievements3.id','=','selection_achievements.achievement_id_3')
        ->join('students','students.id','=','selection_achievements.student_id')
        ->where('selection_achievements.id','=',$id)
        ->first();
        return view('admin.pages.selection_detail_achievement_pages',compact('achievData'));
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
    public function update(Request $request, $id,$departementId,$status)
    {
        try {
            SelectionAchievement::where('id','=', $id)->update(array('status' => $status));
            return redirect()->route('selectionachievement.home',['departementId'=>$departementId])->with([
                'successful_message' => 'Data Seleksi Prestasi berhasil Diupdate',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('selectionachievement.home',['departementId'=>$departementId])->with([
                'failed_message' => $th->getMessage(),
            ]);
        }
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
