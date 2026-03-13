<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFeature;
use App\Models\ServiceProcess;
use App\Models\ServiceSidebarInfo;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Service()
    {
        $services = Service::with('features', 'process', 'sidebar')->get();
        return view('backend.service.service', compact('services'));
    }

    public function store(Request $request)
    {

        // Image Upload
        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/service/'), $imageName);
        }

        // Service Table
        $service = Service::create([
            'header_title' => $request->header_title,
            'header_description' => $request->header_description,
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'section_description' => $request->section_description,
            'image' => $imageName,
            'description' => $request->description
        ]);

        // Features
        ServiceFeature::create([
            'service_id' => $service->id,
            'performance_analytics' => $request->performance_analytics,
            'target_audience_research' => $request->target_audience_research,
            'content_creation' => $request->content_creation,
            'social_media_management' => $request->social_media_management
        ]);

        // Process
        ServiceProcess::create([
            'service_id' => $service->id,
            'strategy_development' => $request->strategy_development,
            'implementation' => $request->implementation,
            'optimization' => $request->optimization,
            'results_reporting' => $request->results_reporting
        ]);

        // Sidebar
        ServiceSidebarInfo::create([
            'service_id' => $service->id,
            'duration' => $request->duration,
            'delivery' => $request->delivery,
            'team_size' => $request->team_size,
            'support' => $request->support
        ]);

        return redirect()->back()->with('success', 'Service Added Successfully');
    }

    public function update(Request $request)
    {

        Service::find($request->id)->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description
        ]);

        return back();
    }


    public function detailsUpdate(Request $request)
    {
        $service = Service::with('features', 'process', 'sidebar')->find($request->id);

        $service->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'header_title' => $request->header_title,
            'header_description' => $request->header_description,
            'section_description' => $request->section_description,
        ]);

        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path('backend/images/service/' . $service->image))) {
                unlink(public_path('backend/images/service/' . $service->image));
            }

            $imageName = rand() . '-service.' . $request->image->extension();
            $request->image->move(public_path('backend/images/service/'), $imageName);
            $service->image = $imageName;
        }

        $service->features->update([
            'performance_analytics' => $request->performance_analytics,
            'target_audience_research' => $request->target_audience_research,
            'content_creation' => $request->content_creation,
            'social_media_management' => $request->social_media_management,
        ]);

        $service->process->update([
            'strategy_development' => $request->strategy_development,
            'implementation' => $request->implementation,
            'optimization' => $request->optimization,
            'results_reporting' => $request->results_reporting,
        ]);

        $service->sidebar->update([
            'duration' => $request->duration,
            'delivery' => $request->delivery,
            'team_size' => $request->team_size,
            'support' => $request->support,
        ]);

        return back()->with('success', 'Service Updated Successfully');
    }

    public function detailsDestroy($id)
    {
        $service = Service::findOrFail($id);

        // ইমেজ থাকলে ডিলিট করা
        if ($service->image && file_exists(public_path('backend/images/service/' . $service->image))) {
            unlink(public_path('backend/images/service/' . $service->image));
        }

        // ব্যানার ডিলিট করা
        $service->delete();

        return redirect()->back()->with('success', 'Banner deleted successfully!');
    }
}
