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
        $packed = Order::where('order_status', '1')->get();
        return view('retailer.orders', compact('corfirmed', 'packed'));

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
        $order_data = [
            'tracking_no' => $orders->tracking_no,
        ];
        if ($orders->order_status == '2') {
            Mail::to($orders->email)->send(new InvoiceMail($order_data));
        }
        $orders->update();
        return redirect('retailer/dashboard')->with('timer', "Order Updated Successfully");
    }
}
