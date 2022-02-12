<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function slider()
    {
        $slider = Slider::all();
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
        $slider->status = $request->input('status') == TRUE ? '1':'0';
        $slider->save();
        return redirect('slider')->with('status',"Slider Added Successfully");
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(Request $request,$id)
    {
        $slider = Slider::find($id);
        if ($request->hasFile('image')) 
        {
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
        $slider->status = $request->input('status') == TRUE ? '1':'0';
        $slider->save();
        return redirect('slider')->with('status',"Slider Added Successfully");
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
