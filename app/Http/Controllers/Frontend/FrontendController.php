<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\SubCategory;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use Request;

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

    public function viewcategory($cat_slug)
    {
        if (Category::where('slug', $cat_slug)->exists()) {   // if category exists
            $category = Category::where('slug', $cat_slug)->first();
            // $category_id = $category->id;
            $subcategory = SubCategory::where('cat_id', $category->id)->where('status', '1')->get();
            return view('frontend.subcategory', compact('category', 'subcategory'));
        } else {    // if category does not exist
            return redirect('/')->with('status', "Slug doesn't exist");
        }
    }

    public function subcatview($cat_slug, $subcat_slug)
    {
        if (Category::where('slug', $cat_slug)->exists()) {
            if (SubCategory::where('slug', $subcat_slug)->exists()) {    // if category exists
                $subcategory = SubCategory::where('slug',  $subcat_slug)->first();
                $sort = Request::get('sort');
                if ($sort == 'price_asc') {
                    $products = Product::where('subcat_id', $subcategory->id)->orderBy('price', 'asc')->where('status', '1')->get();
                } elseif ($sort == 'price_asc') {
                    $products = Product::where('subcat_id', $subcategory->id)->orderBy('price', 'desc')->where('status', '1')->get();
                } elseif ($sort == 'newest') {
                    $products = Product::where('subcat_id', $subcategory->id)->orderBy('created_at', 'desc')->where('status', '1')->get();
                } elseif ($sort == 'trending') {
                    $products = Product::where('subcat_id', $subcategory->id)->orderBy('trending', 'desc')->where('status', '1')->get();
                } else {
                    $products = Product::where('subcat_id', $subcategory->id)->where('status', '1')->get();
                }
                return view('frontend.products.index', compact('subcategory', 'products'));
            } else {    // if sub category does not exist
                return redirect('/')->with('status', " Sub Cat Slug doesn't exist");
            }
        } else {
            return redirect('/')->with('status', "Sub Cat Slug doesn't exist");
        }
    }

    public function productview($cat_slug, $subcat_slug, $prod_slug)
    {
        if (Category::where('slug', $cat_slug)->exists()) {         // if category exists
            if (SubCategory::where('slug', $subcat_slug)->exists()) {     // if sub category exists
                if (Product::where('slug', $prod_slug)->exists()) {      // if product exists
                    $products = Product::where('slug', $prod_slug)->first();
                    $ratings = Rating::where('prod_id', $products->id)->get();
                    $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                    $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
                    $reviews = Review::where('prod_id', $products->id)->get();
                    if ($ratings->count() > 0) {
                        $rating_value = $rating_sum / $ratings->count();
                    } else {
                        $rating_value = 0;
                    }
                    return view('frontend.products.view', compact('products', 'ratings', 'rating_value', 'user_rating', 'reviews'));
                } else {    // if product does not exist
                    return redirect('/')->with('status', "The link was broken or the product doesn't exist :/");
                }
            } else {
                return redirect('/')->with('status', "The link was  broken or the product doesn't exist :/");
            }
        } else {    // if category does not exist
            return redirect(' /')->with('sta tus', "No such category found :/");
        }
    }
}
