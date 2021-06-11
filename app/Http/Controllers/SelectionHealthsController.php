<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Health;
use DB;

class SelectionHealthsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthData=DB::table('healths')
        ->select('healths.*',
        'students.name AS nameStudents')
        ->join('students','students.id','=','healths.student_id') 
        ->get();
        return view('admin.pages.selection_health_pages',compact('healthData'));
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
    public function update(Request $request, $id,$status)
    {
        try {
            Health::where('id','=', $id)->update(array('status' => $status));
            return redirect()->route('selectionhealths.home')->with([
                'successful_message' => 'Data berhasil Diupdate',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('selectionhealths.home')->with([
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
