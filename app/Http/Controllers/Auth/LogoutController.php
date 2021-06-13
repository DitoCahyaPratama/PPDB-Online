<?php

namespace App\Http\Controllers\Auth;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function logoutAdmin(){
        Alert::info('Info Title', 'Info Message');
        Auth::logout();
        return redirect('/admin/login');
    }
}
