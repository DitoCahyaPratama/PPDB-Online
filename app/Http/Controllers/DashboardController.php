<?php

namespace App\Http\Controllers;

use App\Models\Config;
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
        $user = Auth::user();
        $email = $user->email;
        $config = Config::first();
        if($verifyBiodata != null){
            $student_id = $verifyBiodata['id'];
            $no_daftar = substr($user['created_at'], 0,3).".".substr($user['created_at'], 3,1).substr($user['created_at'], 5,2).".".substr($user['created_at'], 8,2).substr($user['created_at'], 11,1).".".substr($user['created_at'], 12,1).substr($user['created_at'], 14,2).".".substr($user['created_at'], 17,2).$user['id'];
            $verifySchoolOrigin = SchoolOrigin::with('student')->where(['student_id' => $student_id])->get();
            $verifyHealth = Health::with('student')->where(['student_id' => $student_id])->get();
            $verifyJurusan1 = SelectionAchievement::with('student')->where(['student_id' => $student_id])->get();
            $verifyJurusan2 = SelectionReport::with('student')->where(['student_id' => $student_id])->get();
            return view("student.dashboard", compact(['verifyBiodata', 'verifySchoolOrigin', 'verifyHealth', 'verifyJurusan1', 'verifyJurusan2', 'email', 'no_daftar', 'config']));
        }else{
            $no_daftar = substr($user['created_at'], 0,3).".".substr($user['created_at'], 3,1).substr($user['created_at'], 5,2).".".substr($user['created_at'], 8,2).substr($user['created_at'], 11,1).".".substr($user['created_at'], 12,1).substr($user['created_at'], 14,2).".".substr($user['created_at'], 17,2).$user['id'];
            $verifySchoolOrigin = array();
            $verifyHealth = array();
            $verifyJurusan1 = array();
            $verifyJurusan2 = array();
            return view("student.dashboard", compact(['verifyBiodata', 'verifySchoolOrigin', 'verifyHealth', 'verifyJurusan1', 'verifyJurusan2', 'email', 'config', 'no_daftar']));
        }
    }
}
