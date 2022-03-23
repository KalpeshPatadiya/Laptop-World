<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //
    public function add(Request $request)
    {
        $stars_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');

        $product_check = Product::where('id', $product_id)->where('status', '1')->first();
        if ($product_check) {
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)->get();
            $delivered_order = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)
                ->where('orders.order_status', '4')->get();
            $cancelled_order = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)
                ->where('orders.order_status', '6')->get();
            if ($delivered_order->count() > 0) {
                $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                if ($existing_rating) {
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->update();
                } else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'stars_rated' => $stars_rated
                    ]);
                }
                return redirect()->back()->with('success', 'Thank you for rating ' . $product_check->name );
            } elseif ($cancelled_order->count() > 0) {
                return redirect()->back()->with('error', 'You cannot rate ' . $product_check->name . ' now, your order has been cancelled.');
            } elseif ($verified_purchase->count() > 0) {
                return redirect()->back()->with('error', 'You cannot rate ' . $product_check->name . ' yet, Please wait for the delivery.');
            } else {
                return redirect()->back()->with('error', 'You cannot rate ' . $product_check->name . ' without purchase');
            }
        } else {
            return redirect()->back()->with('error', "The link was broken");
        }
    }
}
