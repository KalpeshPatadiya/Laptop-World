<?php

namespace App\Http\Controllers\DeliveryMan;

use App\Http\Controllers\Controller;
use App\Mail\DeliveryMail;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $out_delivery = Order::where('order_status', '3')->get();
        $not_delivery = Order::where('order_status', '5')->get();
        return view('delivery.index', compact('out_delivery', 'not_delivery'));
    }

    public function view($id)
    {
        $orders = Order::where(['id' => $id])->first();
        return view('delivery.orderView', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->order_status = $request->input('order_status');
        $orders->not_delivered_reason = $request->input('not_delivered_reason');
        $order_data = ['tracking_no' => $orders->tracking_no,];
        if ($orders->order_status == '4') {
            Mail::to($orders->email)->send(new DeliveryMail($order_data));
        }
        $orders->update();
        return redirect('delivery/dashboard')->with('timer', "Order Updated Successfully");
    }
}
