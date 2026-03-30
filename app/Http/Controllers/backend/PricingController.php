<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function price()
    {
        $pricing = Pricing::get();
        return view('backend.package.pricing', compact('pricing'));
    }

    public function priceStore(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'delivery_time' => 'nullable|string|max:255',
            'features' => 'nullable|array'
        ]);

        // ✅ Remove empty features
        $features = array_filter($request->features ?? []);

        // ✅ Store Data
        Pricing::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'price' => $request->price,
            'description' => $request->description,
            'delivery_time' => $request->delivery_time,
            'features' => json_encode($features),
        ]);

        return back()->with('success', 'Pricing Added Successfully!');
    }

    public function update(Request $request, $id)
    {
        $price = Pricing::find($id);

        $price->title = $request->title;
        $price->subtitle = $request->subtitle;
        $price->price = $request->price;
        $price->description = $request->description;
        $price->delivery_time = $request->delivery_time;

        $price->features = json_encode($request->features);

        $price->save();

        return back()->with('success', 'Package Updated Successfully');
    }

    public function delete($id)
{
    $price = Pricing::find($id);

    if($price){
        $price->delete();
    }

    return back()->with('success','Package Deleted Successfully');
}
}
