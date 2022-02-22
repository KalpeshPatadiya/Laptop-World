<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('admin.product.add', compact('subcategory', 'category'));
    }

    public function insert(Request $request)
    {
        $products = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->image = $filename;
        }
        $products->cat_id = $request->input('cat_id');
        $products->subcat_id = $request->input('subcat_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->high_heading = $request->input('high_heading');
        $products->highlights = $request->input('highlights');
        $products->des_heading = $request->input('des_heading');
        $products->description = $request->input('description');
        $products->det_heading = $request->input('det_heading');
        $products->details = $request->input('details');
        $products->new_arrivals = $request->input('new_arrivals');
        $products->MRP = $request->input('MRP');
        $products->price = $request->input('price');
        $products->quantity = $request->input('quantity');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->new_arrivals = $request->input('new_arrivals') == TRUE ? '1' : '0';
        $products->save();
        return redirect('products')->with('status', "Product Added Successfully");
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->high_heading = $request->input('high_heading');
        $products->highlights = $request->input('highlights');
        $products->des_heading = $request->input('des_heading');
        $products->description = $request->input('description');
        $products->det_heading = $request->input('det_heading');
        $products->details = $request->input('details');
        $products->new_arrivals = $request->input('new_arrivals');
        $products->MRP = $request->input('MRP');
        $products->price = $request->input('price');
        $products->quantity = $request->input('quantity');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->new_arrivals = $request->input('new_arrivals') == TRUE ? '1' : '0';
        $products->update();
        return redirect('products')->with('status', "Product Updated Successfully");
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $path = 'assets/uploads/products/' . $products->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $products->delete();
        return redirect('products')->with('status', "Product Deleted Successfully");
    }
}
