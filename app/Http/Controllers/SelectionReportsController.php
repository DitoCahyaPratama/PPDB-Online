<?php

namespace App\Http\Controllers;

use App\Models\SelectionReport;
use App\Models\Config;
use Illuminate\Http\Request;
use DB;

class SelectionReportsController extends Controller
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
        $reportData=DB::table('selection_reports')
        ->select('selection_reports.*','reports.*','students.name AS nameStudents')
        ->join('reports','reports.id','=','selection_reports.report_id')
        ->join('students','students.id','=','reports.student_id')
        ->where('department_id','=',$depId)
        ->orderBy('avg','desc')
        ->get();
        $countStudents=SelectionReport::where('department_id','=',$depId)->count();
        $countFinalization=SelectionReport::where('department_id','=',$depId)->where('status','=',1)->count();
        $configData=Config::find(1)->first();
        return view('admin.pages.selection_report_pages',compact('departement','reportData','countStudents','configData','depId','countFinalization'));
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
     * @param  \App\Models\SelectionReport  $selectionReport
     * @return \Illuminate\Http\Response
     */
    public function show(SelectionReport $selectionReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SelectionReport  $selectionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SelectionReport $selectionReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SelectionReport  $selectionReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$departementId)
    {
        try {
            SelectionReport::where('department_id','=', $departementId)->orderBy('avg','desc')->take(1)->update(array('status' => 1));
            SelectionReport::where('department_id','=', $departementId)->where('status','=',0)->update(array('status' => 2));
            return redirect()->route('selectionreports.home',['departementId'=>$departementId])->with([
                'successful_message' => 'Data Seleksi berhasil Difinalisasi',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('selectionreports.home',['departementId'=>$departementId])->with([
                'failed_message' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SelectionReport  $selectionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelectionReport $selectionReport)
    {
        //
    }
}

