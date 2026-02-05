<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function AdminLogin()
    {
        return view('backend.admin-login');
    }

    public function AdminLogout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
