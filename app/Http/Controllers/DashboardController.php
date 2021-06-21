<?php

namespace App\Http\Controllers;

use App\Models\Health;
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
        $verifyBiodata = Student::where(['user_id' => $id])->first();
        if($verifyBiodata != null){
            $student_id = $verifyBiodata['id'];
            $verifySchoolOrigin = SchoolOrigin::with('student')->where(['student_id' => $id])->get();
            $verifyHealth = Health::with('student')->where(['student_id' => $id])->get();
            $verifyJurusan1 = SelectionAchievement::with('student')->where(['student_id' => $id])->get();
            $verifyJurusan2 = SelectionReport::with('student')->where(['student_id' => $id])->get();
            return view("student.dashboard", compact(['verifyBiodata', 'verifySchoolOrigin', 'verifyHealth', 'verifyJurusan1', 'verifyJurusan2']));
        }else{
            $verifySchoolOrigin = array();
            $verifyHealth = array();
            $verifyJurusan1 = array();
            $verifyJurusan2 = array();
            return view("student.dashboard", compact(['verifyBiodata', 'verifySchoolOrigin', 'verifyHealth', 'verifyJurusan1', 'verifyJurusan2']));
        }
    }
}
