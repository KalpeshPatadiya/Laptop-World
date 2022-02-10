<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('order_status','0')->orwhere('order_status','like','%1%')->get();
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
        $orders->update();
        return redirect('orders')->with('status', "Order Updated Successfully");
    }

    public function orderhistory()
    {
        $orders = Order::where('order_status', '2')->orwhere('order_status','like','%3%')->get();
        return view('admin.orders.history', compact('orders'));
    }
}
