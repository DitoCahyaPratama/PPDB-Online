<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectionAchievement;
use App\Models\Achievement;
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
        $achievData=SelectionAchievement::with(['student','achievement1','achievement2','achievement3'])->where('department_id','=',$depId)->get();
        $countAccept=SelectionAchievement::where('department_id','=',$depId)->where('status','=',1)->count();
        $countDecline=SelectionAchievement::where('department_id','=',$depId)->where('status','=',2)->count();
        return view('admin.pages.selection_achievement_pages',compact('departement','achievData','countAccept','countDecline'));
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
        $achievData=SelectionAchievement::with(['student','achievement1','achievement2','achievement3'])->where('selection_achievements.id','=',$id)->first();
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
            $countAccept=SelectionAchievement::where('department_id','=',$departementId)->where('status','=',1)->count();
            if ($status == 1) {
                if ($countAccept == 50) {
                    return redirect()->route('selectionachievement.home',['departementId'=>$departementId])->with([
                        'failed_message' => 'Kuota sudah sudah penuh',
                    ]);
                }else{
                    SelectionAchievement::where('id','=', $id)->update(array('status' => 1));
                        return redirect()->route('selectionachievement.home',['departementId'=>$departementId])->with([
                        'successful_message' => 'Data Seleksi Prestasi berhasil Diupdate',
                    ]);
                }
            }else{
                SelectionAchievement::where('id','=', $id)->update(array('status' => 2));
                        return redirect()->route('selectionachievement.home',['departementId'=>$departementId])->with([
                        'successful_message' => 'Data Seleksi Prestasi berhasil Diupdate',
                ]);
            }
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
