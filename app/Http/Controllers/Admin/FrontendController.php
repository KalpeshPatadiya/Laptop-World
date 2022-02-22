<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    public function index()
    {
        $totalOrders = \DB::table('orders')->count();
        $totalProducts = \DB::table('products')->count();
        $totalUsers = \DB::table('users')->count();
        $totalSubcategories = \DB::table('subcategories')->count();
        $products = \DB::table('products')->where('quantity', '<=', '5')->get();
        $neworders = OrderItem::orderBy('id', 'desc')->take(5)->get();
        $isAdmin = \DB::table('users')->where('role_as', '1')->take(3)->get();
        return view('admin.index', compact('totalOrders', 'totalProducts', 'totalUsers', 'totalSubcategories', 'products', 'neworders', 'isAdmin'));
    }
    public function slider()
    {
        $slider = Slider::all();
        $slider_count = Slider::count();
        return view('admin.slider.slider', compact('slider'));
    }
    public function add()
    {
        return view('admin.slider.add');
    }
    public function insert(Request $request)
    {
        $slider = new Slider;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/slider/', $filename);
            $slider->image = $filename;
        }
        $slider->heading = $request->input('heading');
        $slider->description = $request->input('description');
        $slider->link = $request->input('link');
        $slider->link_name = $request->input('link_name');
        $slider->status = $request->input('status') == true ? '1' : '0';
        $slider->save();
        return redirect('slider')->with('status', "Slider Added Successfully");
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/image/' . $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/slider/', $filename);
            $slider->image = $filename;
        }
        $slider->heading = $request->input('heading');
        $slider->description = $request->input('description');
        $slider->link = $request->input('link');
        $slider->link_name = $request->input('link_name');
        $slider->status = $request->input('status') == true ? '1' : '0';
        $slider->save();
        return redirect('slider')->with('status', "Slider Updated Successfully");
    }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $path = 'assets/uploads/slider/' . $slider->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $slider->delete();
        return redirect('slider')->with('status', "Slider Deleted Successfully");
    }
}
