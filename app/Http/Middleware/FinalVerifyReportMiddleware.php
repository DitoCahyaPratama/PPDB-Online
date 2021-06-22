<?php

namespace App\Http\Middleware;

use App\Models\Student;
use App\Models\SelectionReport;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalVerifyReportMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::id();
        $student = Student::where(['user_id' => $id])->first();
        $selection = SelectionReport::where(['student_id' => $student->id])->first();
        if($selection != null){
            return redirect()->route('dashboard.student');
        }
        return $next($request);
    }
}
