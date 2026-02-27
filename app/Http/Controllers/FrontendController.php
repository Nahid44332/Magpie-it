<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\TeamIntro;
use App\Models\TeamLeader;
use App\Models\TeamMember;
use App\Models\Whyus;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        $abouts = About::first();
        $whyuses = Whyus::get();
        return view('frontend.index', compact('banners', 'abouts', 'whyuses'));
    }

    public function about()
    {
        $abouts = About::first();
        $whyuses = Whyus::get();
        return view('frontend.about', compact('abouts', 'whyuses'));
    } 

    public function service()
    {
        return view('frontend.service');
    }

    public function serviceDetails()
    {
        return view('frontend.service-details');
    }

    public function protfolio()
    {
        return view('frontend.protfolio');
    }

    public function protfolioDetails()
    {
        return view('frontend.protfolio-details');
    }

    public function team()
    {
        $teamIntro = TeamIntro::first();
        $teamleaders = TeamLeader::get();
        $teammembers = TeamMember::get();
        return view('frontend.team', compact('teamIntro', 'teamleaders', 'teammembers'));
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function blogDetails()
    {
        return view('frontend.blogDetails');
    }

    public function pricing()
    {
        return view('frontend.pricing');
    }

    public function order()
    {
        return view('frontend.order');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
