<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {    // if user is logged in
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {  // if product exists
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {    // if product already in cart
                    return response()->json(['status' => $prod_check->name . " already in cart"]);
                } else {    // if cart is empty
                    $cartItem = new Cart;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_id = $product_id;
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . " added to cart"]);
                }
            }
        } else {    // if user is not logged in
            return response()->json(['status' => "Please login to add product to cart"]);
        }
    }

    public function viewcart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartItems'));
    }

    public function updateCart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if (Auth::check()) {   // if user is logged in
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {   // if product already in cart
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => "Quantity updated"]);
            }
        }
    }

    public function deleteCartItem(Request $request)
    {
        if (Auth::check()) {    // if user is logged in
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {        // if product already in cart
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product Removed Successfully!"]);
            }
        } else {
            return response()->json(['status' => "Please login to delete product from cart"]);
        }
    }

    public function cartcount()
    {
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $cartcount]);
    }
}
