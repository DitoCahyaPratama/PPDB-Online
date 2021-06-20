<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $countUser=DB::table('users')->count();
        $countStudent=DB::table('students')->count();
        $countSelectionAchievements=DB::table('selection_achievements')->count();
        $countSelectionReports=DB::table('selection_reports')->count();
        return view('admin.pages.dashboard_pages',compact('countUser','countStudent','countSelectionReports','countSelectionAchievements'));
    }

    public function student(){
        return view("student.dashboard");
    }
}
