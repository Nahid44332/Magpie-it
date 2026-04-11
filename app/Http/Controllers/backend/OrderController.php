<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order($status)
    {
        if($status == "all"){
             $orders = Order::all(); 
           }
           else{
            $orders = Order::Get()->where('status', $status);
           }  
        return view('backend.order.order', compact('orders'));
    }

    public function statusUpdate(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Status Updated');
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $order->name = $request->name;
        $order->whatsapp = $request->whatsapp;
        $order->email = $request->email;
        $order->subject = $request->subject;
        $order->message = $request->message;

        $order->save();

        return back();
    }

    public function delete($id)
    {
        Order::find($id)->delete();
        return back();
    }
}
