<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('order_status', '0')->orwhere('order_status', 'like', '%1%')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where(['id' => $id])->first();
        return view('admin.orders.view', compact('orders'));
    }

    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->order_status = $request->input('order_status');
        if ($orders->order_status == '1') {
            $order_track_id = Order::find(Auth::id())->where('tracking_no')->get();
            $order_id = OrderItem::find(Auth::id())->where('order_id')->get();
            Mail::to($orders->email)->send(new InvoiceMail($order_track_id, $order_id));
        }
        $orders->update();
        return redirect('orders')->with('timer', "Order Updated Successfully");
    }

    public function orderhistory()
    {
        $orders = Order::where('order_status', '2')->orwhere('order_status', 'like', '%3%')->get();
        return view('admin.orders.history', compact('orders'));
    }
}
