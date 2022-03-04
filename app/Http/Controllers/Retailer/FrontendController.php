<?php

namespace App\Http\Controllers\Retailer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class FrontendController extends Controller
{
    public function index()
    {
        $corfirmed = Order::where('order_status', '0')->get();
        return view('retailer.index', compact('corfirmed'));
    }

    public function orders()
    {
        $pending = Order::where('order_status', '0')->get();
        $shipped = Order::where('order_status', '1')->get();
        $delivered = Order::where('order_status', '2')->get();
        $cancelled = Order::where('order_status', '3')->get();
        return view('retailer.orders', compact('pending', 'shipped', 'delivered', 'cancelled'));
    }

    public function view($id)
    {
        $orders = Order::where(['id' => $id])->first();
        return view('retailer.orderView', compact('orders'));
    }

    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->order_status = $request->input('order_status');
        if ($orders->order_status == '1') {
            Mail::to($orders->email)->send(new InvoiceMail());
        }
        $orders->update();
        return redirect('retailer/orders')->with('timer', "Order Updated Successfully");
    }
}
