<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminDashboard()
    {
        return view('backend.admin-dashboard');
    }
}
