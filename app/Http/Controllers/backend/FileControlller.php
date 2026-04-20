<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;


class FileControlller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function file()
    {
        $files = Files::get();
        return view('backend.file.file', compact('files'));
    }

   public function store(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:jpg,jpeg,png,webp,pdf,zip,rar,doc,docx|max:5120', // ৫ এমবি লিমিট
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        
        // ফাইলটি আপনার কাঙ্ক্ষিত ফোল্ডারে মুভ করা হচ্ছে: public/backend/file
        $file->move(public_path('backend/file'), $filename);
        
        // ডাটাবেজে সেভ করার জন্য পাথ
        $path = 'backend/file/' . $filename;

        // ডাটাবেজে সেভ করা
        Files::create([
            'filename' => $filename,
            'path' => $path,
            'extension' => $extension,
        ]);

        return back()->with('success', 'মামা, ফাইল আপলোড ডান!');
    }

    return back()->with('error', 'ফাইল খুঁজে পাওয়া যায়নি।');
}

    // ৩. ফাইল ডিলিট করা (ডাটাবেজ এবং স্টোরেজ দুই জায়গা থেকেই)
    public function destroy($id)
{
    $file = Files::findOrFail($id);

    // ফোল্ডার থেকে আসল ফাইলটি ডিলিট করা
    // এখানে Illuminate\Support\Facades\File ব্যবহার করতে হবে
    if (\Illuminate\Support\Facades\File::exists(public_path($file->path))) {
        \Illuminate\Support\Facades\File::delete(public_path($file->path));
    }

    // ডাটাবেজ থেকে রেকর্ডটি ডিলিট করা
    $file->delete();

    return back()->with('success', 'মামা, ফাইলটি ডিলিট করা হয়েছে।');
}
}
