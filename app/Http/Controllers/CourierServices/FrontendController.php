<?php

namespace App\Http\Controllers\CourierServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class FrontendController extends Controller
{
    public function index()
    {
        $shipped = Order::where('order_status', '1')->get();
        $delivered = Order::where('order_status', '2')->get();
        $cancelled = Order::where('order_status', '3')->get();
        return view('courier.index', compact('shipped', 'delivered', 'cancelled'));
    }
}
