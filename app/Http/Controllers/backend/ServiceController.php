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
    dd($request->all());
    // ১. Validation
    $request->validate([
        'id' => 'required|exists:services,id',
        'title' => 'required|string|max:255',
        'icon' => 'nullable|string|max:255',
        'short_description' => 'nullable|string',
        'description' => 'nullable|string',
        'header_title' => 'nullable|string',
        'header_description' => 'nullable|string',
        'section_description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'performance_analytics' => 'nullable|string',
        'target_audience_research' => 'nullable|string',
        'content_creation' => 'nullable|string',
        'social_media_management' => 'nullable|string',
        'strategy_development' => 'nullable|string',
        'implementation' => 'nullable|string',
        'optimization' => 'nullable|string',
        'results_reporting' => 'nullable|string',
        'duration' => 'nullable|string',
        'delivery' => 'nullable|string',
        'team_size' => 'nullable|string',
        'support' => 'nullable|string',
    ]);

    // ২. Service খুঁজে পাওয়া
    $service = Service::findOrFail($request->id);

    // ৩. Basic info update
    $service->title = $request->title;
    $service->icon = $request->icon;
    $service->short_description = $request->short_description;
    $service->description = $request->description;
    $service->header_title = $request->header_title;
    $service->header_description = $request->header_description;
    $service->section_description = $request->section_description;

    // ৪. Image update (নতুন image দিলে পুরনো delete)
    if ($request->hasFile('image')) {
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('backend/images/service'), $name);
        $service->image = 'backend/images/service/' . $name;
    }

    $service->save();

    // ৫. Related Features update/create
    $service->features()->updateOrCreate(
        ['service_id' => $service->id],
        [
            'performance_analytics' => $request->performance_analytics,
            'target_audience_research' => $request->target_audience_research,
            'content_creation' => $request->content_creation,
            'social_media_management' => $request->social_media_management,
        ]
    );

    // ৬. Related Process update/create
    $service->process()->updateOrCreate(
        ['service_id' => $service->id],
        [
            'strategy_development' => $request->strategy_development,
            'implementation' => $request->implementation,
            'optimization' => $request->optimization,
            'results_reporting' => $request->results_reporting,
        ]
    );

    // ৭. Related Sidebar update/create
    $service->sidebar()->updateOrCreate(
        ['service_id' => $service->id],
        [
            'duration' => $request->duration,
            'delivery' => $request->delivery,
            'team_size' => $request->team_size,
            'support' => $request->support,
        ]
    );

    $service->save();
    // ৮. Redirect back with success
    return redirect()->back()->with('success', 'Service Updated Successfully');
}
}
