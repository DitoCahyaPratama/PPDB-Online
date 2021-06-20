<?php

namespace App\Http\Controllers;

use App\Models\SchoolOrigin;
use App\Models\SelectionAchievement;
use App\Models\SelectionReport;
use Illuminate\Http\Request;
use App\Models\Student;
use DB;
use Illuminate\Support\Facades\Auth;

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
        $id = Auth::id();
        $verifyBiodata = Student::find($id);
        $verifySchoolOrigin = SchoolOrigin::with('student')->where(['student_id' => $id])->get();
        $verifyJurusan1 = SelectionAchievement::with('student')->where(['student_id' => $id])->get();
        $verifyJurusan2 = SelectionReport::with('student')->where(['student_id' => $id])->get();
        return view("student.dashboard", compact(['verifyBiodata', 'verifySchoolOrigin', 'verifyJurusan1', 'verifyJurusan2']));
    }
}
