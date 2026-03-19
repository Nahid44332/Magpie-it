<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Pricing;
use App\Models\Service;
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
        $services = Service::get();
        return view('frontend.index', compact('banners', 'abouts', 'whyuses', 'services'));
    }

    public function about()
    {
        $abouts = About::first();
        $whyuses = Whyus::get();
        return view('frontend.about', compact('abouts', 'whyuses'));
    } 

    public function service()
    {
        $services = Service::with('features','process','sidebar')->get();
        return view('frontend.service', compact('services'));
    }

    public function serviceDetails($id)
    {
        $services = Service::with('features','process','sidebar')->find($id);
        return view('frontend.service-details', compact('services'));
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
        $pricing = Pricing::get();
        return view('frontend.pricing', compact('pricing'));
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
