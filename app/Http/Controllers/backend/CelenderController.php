<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class CelenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function celender()
    {
        $events = Event::all();
        return view('backend.celender.celender', compact('events'));
    }

    public function eventStore(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->event_date = $request->event_date;
        $event->save();
        return response()->json(['status' => 'success']);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error'], 404);
    }
}
