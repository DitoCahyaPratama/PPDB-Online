<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CheckLoginController extends Controller
{
    public function checkLoginAdmin()
    {
        if (!Auth::check()) {
            return view('admin.layouts.login');
        }else{
            return redirect()->route('dashboard.home');
        }
    }
}
