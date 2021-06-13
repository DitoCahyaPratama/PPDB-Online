<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateConfigRequest;
use DB;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataConfig=DB::table('configs')->first();
        return view('admin.pages.configuration_pages',compact('dataConfig'));
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
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfigRequest $request)
    {
        try {
            Config::find(1)->update($request->except('_token','_method'));
            return redirect()->route('config.home')->with([
                'successful_message' => 'Konfigurasi berhasil diperbarui',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('config.home')->with([
                'failed_message' => $th->getMessage(),
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        //
    }
}
