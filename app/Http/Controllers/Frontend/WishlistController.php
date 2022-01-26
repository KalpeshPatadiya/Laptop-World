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
        return view('Frontend.wishlist',compact('wishlist'));
    }
    
    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => " Product added to wishlist"]);
            }
            else 
            {
                return response()->json(['status' => " Product doesn't exist"]);
            }
        }
        else 
        {
            return response()->json(['status' => "Please login to add product to wishlist"]);
        }
    }
}
