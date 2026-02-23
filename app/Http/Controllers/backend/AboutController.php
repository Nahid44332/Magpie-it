<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Whyus;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function about()
    {
        $abouts = About::first();
        $whyus = Whyus::get();
        return view('backend.about.about', compact('abouts', 'whyus'));
    }

    public function update(Request $request)
    {
        $abouts = About::first();

        $abouts->title = $request->title;
        $abouts->description = $request->description;
        $abouts->years_of_expertise = $request->years_of_expertise;
        $abouts->happy_client = $request->happy_client;
         if ($request->hasFile('image')) {
            if ($abouts->image && file_exists(public_path('backend/images/abouts/' . $abouts->image))) {
                unlink(public_path('backend/images/abouts/' . $abouts->image));
            }

            $imageName = rand() . '-abouts.' . $request->image->extension();
            $request->image->move(public_path('backend/images/abouts/'), $imageName);
            $abouts->image = $imageName;
        }

        $abouts->save();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $data = Whyus::create($request->all());
        return response()->json($data);
    } 

     public function whysUpdate(Request $request, $id)
    {
        $item = Whyus::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

     public function delete($id)
    {
        Whyus::findOrFail($id)->delete();
        return response()->json(['success'=>true]);
    }
}
