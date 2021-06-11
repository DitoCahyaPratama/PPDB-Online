<?php

namespace App\Http\Controllers;

use App\Models\SelectionReport;
use Illuminate\Http\Request;

class SelectionReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($depId)
    {   
        $departement;
        if ($depId == 1) {
            $departement = 'RPL';
        }else if ($depId == 2) {
            $departement = 'TKJ';
        }elseif ($depId == 3) {
            $departement = 'TM';
        }else {
            $departement = 'TEI';
        }
        
        return view('admin.pages.selection_report_pages',compact('departement'));
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
    public function update(Request $request, SelectionReport $selectionReport)
    {
        //
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
