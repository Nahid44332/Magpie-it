<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function message()
    {
        $messages = ContactMessage::get();
        return view('backend.message.message', compact('messages'));
    }

    public function toggleStatus($id)
    {
        // ডাটাবেজ থেকে আইডি অনুযায়ী মেসেজটি খুঁজে বের করা
        $message = \App\Models\ContactMessage::findOrFail($id);

        // স্ট্যাটাস টগল করা (০ থাকলে ১, ১ থাকলে ০)
        $message->status = $message->status == 0 ? 1 : 0;
        $message->save();

        // আগের পেজেই ফিরে যাওয়া
        return back()->with('success', 'Status updated successfully!');
    }

    public function destroy($id)
{
    $message = ContactMessage::find($id);
    $message->delete();

    return back()->with('success', 'মেসেজটি ডিলিট করা হয়েছে!');
}
}
