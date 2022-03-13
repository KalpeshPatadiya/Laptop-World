<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('Frontend.wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role_as == '0') {    // if user is guest
                $product_id = $request->input('product_id');
                $prod_check = Product::where('id', $product_id)->first();

                if ($prod_check) {  // if product exists
                    if (Wishlist::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {    // if product already in wishlist
                        return response()->json(['status' => $prod_check->name . " already in wishlist"]);
                    } else {    // if wishlist is empty
                        $wish = new Wishlist();
                        $wish->prod_id = $product_id;
                        $wish->user_id = Auth::id();
                        $wish->save();
                        return response()->json(['status' => $prod_check->name . " added to wishlist"]);
                    }
                }
            } else {
                return response()->json(['status' => "Access denied!"]);
            }
        } else {
            return response()->json(['status' => "Please login to add product to wishlist"]);
        }
    }

    public function deleteitem(Request $request)
    {
        if (Auth::check()) {    // if user is logged in
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {        // if product already in cart
                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Product Removed Successfully!"]);
            }
        } else {
            return response()->json(['status' => "Please login to delete product from cart"]);
        }
    }

    public function wishlistcount()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishcount]);
    }
}
