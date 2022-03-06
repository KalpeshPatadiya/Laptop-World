<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    public function index()
    {
        $totalOrders = \DB::table('orders')->count();
        $totalProducts = \DB::table('products')->count();
        $totalUsers = \DB::table('users')->where('role_as', '0')->count();
        $totalSubcategories = \DB::table('subcategories')->count();
        $products = \DB::table('products')->where('quantity', '<=', '5')->take(10)->get();
        $neworders = Order::where('order_status', '0')->orwhere('order_status', '1')->orderBy('id', 'desc')->take(7)->get();
        $isAdmin = \DB::table('users')->where('role_as', '1')->take(5)->get();
        $isRetailer = \DB::table('users')->where('role_as', '2')->take(5)->get();
        $isCourier = \DB::table('users')->where('role_as', '3')->take(5)->get();
        $isDeliveryMan = \DB::table('users')->where('role_as', '4')->take(7)->get();
        $totalSliders = \DB::table('slider')->count();
        $totalreviews = \DB::table('reviews')->count();
        return view('admin.index', compact('totalOrders', 'totalProducts', 'totalUsers', 'totalSubcategories', 'products', 'neworders', 'isAdmin', 'totalSliders', 'totalreviews', 'isRetailer', 'isCourier', 'isDeliveryMan'));
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
            $imgname = $file->getClientOriginalName();
            $file->move('assets/uploads/slider/', $imgname);
            $slider->image = $imgname;
        }
        $slider->link = $request->input('link');
        $slider->status = $request->input('status') == true ? '1' : '0';
        $slider->save();
        return redirect('slider')->with('timer', "Slider Added Successfully");
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
            $path = 'assets/uploads/slider/' . $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $imgname = $file->getClientOriginalName();
            $file->move('assets/uploads/slider/', $imgname);
            $slider->image = $imgname;
        }
        $slider->link = $request->input('link');
        $slider->status = $request->input('status') == true ? '1' : '0';
        $slider->save();
        return redirect('slider')->with('timer', "Slider Updated Successfully");
    }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $path = 'assets/uploads/slider/' . $slider->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $slider->delete();
        return redirect('slider')->with('timer', "Slider Deleted Successfully");
    }
}
