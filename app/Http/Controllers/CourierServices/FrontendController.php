<?php

namespace App\Http\Controllers\CourierServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class FrontendController extends Controller
{
    public function index()
    {
        $shipped = Order::where('order_status', '2')->get();
        return view('courier.index', compact('shipped'));
    }

    public function view($id)
    {
        $orders = Order::where(['id' => $id])->first();
        return view('courier.orderView', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->order_status = $request->input('order_status');
        $orders->update();
        return redirect('courier/dashboard')->with('timer', "Order Updated Successfully");
    }
}
