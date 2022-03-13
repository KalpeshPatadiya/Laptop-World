<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\SubCategory;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
//use Illuminate\Http\Request;
use Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(12)->get();
        $new_products = Product::where('new_arrivals', '1')->orderBy('created_at', 'desc')->take(8)->get();
        $popular_brand = SubCategory::where('popular', '1')->take(10)->get();
        $slider = Slider::where('status', '1')->get();
        return view('frontend.index', compact('featured_products', 'new_products', 'popular_brand', 'slider'));
    }

    public function viewcategory($cat_slug)
    {
        if (Category::where('slug', $cat_slug)->exists()) {   // if category exists
            $category = Category::where('slug', $cat_slug)->first();
            // $category_id = $category->id;
            $subcategory = SubCategory::where('cat_id', $category->id)->where('status', '1')->get();
            return view('frontend.subcategory', compact('category', 'subcategory'));
        } else {    // if category does not exist
            return redirect('/')->with('error', "Slug does not exist");
        }
    }

    public function subcatview($cat_slug, $subcat_slug)
    {
        if (Category::where('slug', $cat_slug)->exists()) {
            if (SubCategory::where('slug', $subcat_slug)->exists()) {    // if category exists
                $subcategory = SubCategory::where('slug', $subcat_slug)->first();
                $subcatlist = SubCategory::where('cat_id', $subcategory->cat_id)->get();
                $sort = Request::get('sort');
                if ($sort == 'price_asc') {
                    $products = Product::where('subcat_id', $subcategory->id)->orderBy('price', 'asc')->where('status', '1')->get();
                } elseif ($sort == 'price_desc') {
                    $products = Product::where('subcat_id', $subcategory->id)->orderBy('price', 'desc')->where('status', '1')->get();
                } elseif ($sort == 'newest') {
                    $products = Product::where('subcat_id', $subcategory->id)->orderBy('created_at', 'desc')->where('status', '1')->get();
                } elseif ($sort == 'trending') {
                    $products = Product::where('subcat_id', $subcategory->id)->orderBy('trending', 'desc')->where('status', '1')->get();
                } elseif (Request::get('filterbrand')) {
                    $checked = $_GET['filterbrand'];

                    $subcat_filter = SubCategory::whereIn('name', $checked)->get();
                    $subcatid = [];
                    foreach ($subcat_filter as $subcat) {
                        array_push($subcatid, $subcat->id);   // get subcat id
                    }
                    $products = Product::whereIn('subcat_id', $subcatid)->where('status', '1')->get();
                } else {
                    $products = Product::where('subcat_id', $subcategory->id)->where('status', '1')->get();
                }
                return view('frontend.products.index', compact('subcategory', 'products', 'subcatlist'));
            } else {    // if sub category does not exist
                return redirect('/')->with('error', " Sub Cat Slug does not exist");
            }
        } else {
            return redirect('/')->with('error', "Sub Cat Slug does not exist");
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
                    return redirect('/')->with('error', "The link was broken or the product does not exist :/");
                }
            } else {
                return redirect('/')->with('error', "The link was  broken or the product does not exist :/");
            }
        } else {    // if category does not exist
            return redirect(' /')->with('error', "No such category found :/");
        }
    }
}
