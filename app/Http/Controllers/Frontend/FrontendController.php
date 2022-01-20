<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_category'));
    }

    public function category()
    {
        $category = Category::where('status', '1')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {   // if category exists
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cat_id', $category->id)->where('status', '1')->get();
            return view('frontend.products.index', compact('category', 'products'));
        } else {    // if category does not exist
            return redirect('/')->with('status', "Slug doesn't exist");
        }
    }

    public function productview($cat_slug, $prod_slug)
    {
        if (Category::where('slug', $cat_slug)->exists()) {  // if category exists
            if (Product::where('slug', $prod_slug)->exists()) { // if product exists
                $products = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('products'));
            } else {    // if product does not exist
                return redirect('/')->with('status', "The link was broken or the product doesn't exist :/");
            }
        } else {    // if category does not exist
            return redirect('/')->with('status', "No such category found :/");
        }
    }
}
