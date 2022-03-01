<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function add($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '1')->first();
        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            } else {
                $verified_purchase = Order::where('orders.user_id', Auth::id())
                    ->join('order_items', 'orders.id', 'order_items.order_id')
                    ->where('order_items.prod_id', $product_id)->get();
                return view('frontend.reviews.index', compact('product', 'verified_purchase'));
            }
        } else {
            return redirect()->back()->with('error', "The link was broken");
        }
    }

    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', '1')->first();
        if ($product) {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review
            ]);
            $category_slug = $product->subcategory->category->slug;
            $sub_category_slug = $product->subcategory->slug;
            $prod_slug = $product->slug;
            if ($new_review) {
                return redirect('collection/' . $category_slug . '/' . $sub_category_slug . '/' . $prod_slug)->with('success', "Thank you for your thoughts");
            }
        } else {
            return redirect()->back()->with('error', "The link was broken");
        }
    }

    public function edit($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '1')->first();
        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('product', 'review'));
            } else {
                return redirect()->back()->with('error', "The link was broken");
            }
        } else {
            return redirect()->back()->with('error', "The link was broken");
        }
    }

    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if ($user_review != '') {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {
                $review->user_review = $user_review;
                $review->update();
                return redirect('collection/' . $review->product->subcategory->category->slug . '/' . $review->product->subcategory->slug . '/' . $review->product->slug)->with('success', "Review Updated Successfully");
            } else {
                return redirect()->back()->with('error', "The link was broken");
            }
        } else {
            return redirect()->back()->with('error', "You cannot submit an empty review");
        }
    }
}
