<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProtfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function portfolio()
    {
        $portfolios = Portfolio::with('gallery')->get();
        return view('backend.portfolio.portfolio', compact('portfolios'));
    }

    public function store(Request $request)
    {
        // ১. ভ্যালিডেশন
        $request->validate([
            'title' => 'required|string|max:255',
            'main_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $portfolio = new Portfolio();

        // ২. মেইন ইমেজ আপলোড (backend/images/portfolio/)
        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $imageName = time() . '_' . Str::random(5) . '.' . $image->getClientOriginalExtension();
            $directory = public_path('backend/images/portfolio/');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $image->move($directory, $imageName);
            $portfolio->main_image = 'backend/images/portfolio/' . $imageName;
        }

        // ৩. পোর্টফোলিও মূল তথ্য সেভ করা
        $portfolio->title = $request->title;
        $portfolio->category = $request->category;
        $portfolio->company_name = $request->company_name;
        $portfolio->date = $request->date;
        $portfolio->rating = $request->rating;

        // Array ডেটাগুলোকে JSON হিসেবে সেভ করা
        $portfolio->technologies = $request->technologies ? json_encode($request->technologies) : null;
        $portfolio->features = $request->features ? json_encode($request->features) : null;

        $portfolio->description = $request->description;
        $portfolio->overview = $request->overview;
        $portfolio->challenge = $request->challenge;
        $portfolio->solution = $request->solution;
        $portfolio->live_link = $request->live_link;
        $portfolio->github_link = $request->github_link;

        $portfolio->save(); // এখানে মেইন পোর্টফোলিও সেভ হবে

        // ৪. গ্যালারি ইমেজ আলাদা টেবিলে সেভ করা
        if ($request->hasFile('image')) {
            $galleryDirectory = public_path('backend/images/portfolio/gallery/');

            if (!file_exists($galleryDirectory)) {
                mkdir($galleryDirectory, 0777, true);
            }

            foreach ($request->file('image') as $key => $file) {
                $gImageName = time() . '_gallery_' . $key . '.' . $file->getClientOriginalExtension();
                $file->move($galleryDirectory, $gImageName);

                // আলাদা গ্যালারি টেবিলে ইনসার্ট করা
                $gallery = new PortfolioGallery();
                $gallery->portfolio_id = $portfolio->id; // মেইন পোর্টফোলিও'র ID
                $gallery->image = 'backend/images/portfolio/gallery/' . $gImageName;
                $gallery->save();
            }
        }

        return redirect()->back()->with('success', 'Portfolio and Gallery added successfully!');
    }

    public function update(Request $request, $id)
    {
        // ১. ভ্যালিডেশন
        $request->validate([
            'title' => 'required|string|max:255',
            'main_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $portfolio = Portfolio::findOrFail($id);

        // ২. মেইন ইমেজ আপডেট লজিক
        if ($request->hasFile('main_image')) {
            // পুরনো ইমেজটি ফোল্ডার থেকে ডিলিট করা (যদি থাকে)
            if ($portfolio->main_image && file_exists(public_path($portfolio->main_image))) {
                unlink(public_path($portfolio->main_image));
            }

            // নতুন ইমেজ সেভ করা
            $image = $request->file('main_image');
            $imageName = time() . '_main.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/images/portfolio/'), $imageName);

            // ডাটাবেজে নতুন পাথ সেট করা
            $portfolio->main_image = 'backend/images/portfolio/' . $imageName;
        }

        // ৩. অন্যান্য ফিল্ড আপডেট করা
        $portfolio->title = $request->title;
        $portfolio->category = $request->category;
        $portfolio->description = $request->description;
        $portfolio->rating = $request->rating;

        // Technologies এবং Features (যেহেতু এগুলো অ্যারে হিসেবে আসবে)
        $portfolio->technologies = $request->technologies;
        $portfolio->features = $request->features;

        $portfolio->save();

        // ৪. গ্যালারি ইমেজ আপডেট (ঐচ্ছিক - যদি ইউজার নতুন গ্যালারি ইমেজ যোগ করে)
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $file) {
                $gImageName = time() . '_gallery_' . $key . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('backend/images/portfolio/gallery/'), $gImageName);

                $gallery = new PortfolioGallery();
                $gallery->portfolio_id = $portfolio->id;
                $gallery->image = 'backend/images/portfolio/gallery/' . $gImageName;
                $gallery->save();
            }
        }

        return redirect()->back()->with('success', 'Portfolio updated successfully!');
    }

    public function destroy($id)
{
    // ১. ডাটা খুঁজে বের করা (গ্যালারি ইমেজসহ)
    $portfolio = Portfolio::findOrFail($id);
    $galleryImages = PortfolioGallery::where('portfolio_id', $id)->get();

    // ২. মেইন ইমেজ ডিলিট করা (যদি থাকে)
    if ($portfolio->main_image) {
        $mainImagePath = public_path($portfolio->main_image);
        if (File::exists($mainImagePath)) {
            File::delete($mainImagePath);
        }
    }

    // ৩. গ্যালারি ইমেজগুলো লুপ চালিয়ে ডিলিট করা
    foreach ($galleryImages as $gallery) {
        if ($gallery->image) {
            $galleryPath = public_path($gallery->image);
            if (File::exists($galleryPath)) {
                File::delete($galleryPath);
            }
        }
        // গ্যালারি টেবিল থেকে ডাটা ডিলিট
        $gallery->delete();
    }

    // ৪. সবশেষে মেইন পোর্টফোলিও টেবিল থেকে ডাটা ডিলিট
    $portfolio->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Portfolio, Main Image, and Gallery deleted successfully!'
    ]);
}
}
