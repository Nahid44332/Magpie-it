<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class bannercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function banner()
    {
        $banners = Banner::get();
        return view('backend.banner.banner', compact('banners'));
    }

    public function store(Request $request)
    {
        $banner = new Banner();

        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->projects_completed = $request->projects_completed;
        $banner->client_satisfaction = $request->client_satisfaction;
        $banner->team_members = $request->client_satisfaction;

        if (isset($request->image)) {
            $imageName = rand() . '-banner-' . '.' . $request->image->extension();
            $request->image->move('backend/images/banner/', $imageName);

            $banner->image = $imageName;
        }
        $banner->save();
        return redirect()->back();
    }

    /**
     * Update Banner
     */
    public function update(Request $request, $id)
    {
        // ব্যানার খুঁজে বের করা
        $banner = Banner::findOrFail($id);

        // ইনপুট ফিল্ড আপডেট করা
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->projects_completed = $request->projects_completed;
        $banner->client_satisfaction = $request->client_satisfaction;
        $banner->team_members = $request->team_members;

        // যদি নতুন ইমেজ আপলোড করা হয়
        if ($request->hasFile('image')) {
            // পুরানো ইমেজ ডিলিট করা
            if ($banner->image && file_exists(public_path('backend/images/banner/' . $banner->image))) {
                unlink(public_path('backend/images/banner/' . $banner->image));
            }

            // নতুন ইমেজ আপলোড করা
            $imageName = rand() . '-banner.' . $request->image->extension();
            $request->image->move(public_path('backend/images/banner/'), $imageName);
            $banner->image = $imageName;
        }

        // ডেটাবেসে সেভ করা
        $banner->save();

        return redirect()->back()->with('success', 'Banner updated successfully!');
    }

    /**
     * Delete Banner
     */
    public function destroy($id)
    {
        // ব্যানার খুঁজে বের করা
        $banner = Banner::findOrFail($id);

        // ইমেজ থাকলে ডিলিট করা
        if ($banner->image && file_exists(public_path('backend/images/banner/' . $banner->image))) {
            unlink(public_path('backend/images/banner/' . $banner->image));
        }

        // ব্যানার ডিলিট করা
        $banner->delete();

        return redirect()->back()->with('success', 'Banner deleted successfully!');
    }
}
