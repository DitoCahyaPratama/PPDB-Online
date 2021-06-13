<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function logoutAdmin(){
        Auth::logout();
        return redirect('/admin/login');
    }
}
