<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function service()
    {
        return view('frontend.service');
    }

    public function protfolio()
    {
        return view('frontend.protfolio');
    }

    public function team()
    {
        return view('frontend.team');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function pricing()
    {
        return view('frontend.pricing');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
