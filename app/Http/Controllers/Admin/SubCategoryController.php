<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        $subcategory = SubCategory::where('status', '1')->get();
        return view('admin.subcategory.index', compact('category', 'subcategory'));
    }
    public function add()
    {
        $category = Category::all();
        return view('admin.subcategory.add', compact('category'));
    }
    public function insert(Request $request)
    {
        $subcategory = new SubCategory();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imgname = $file->getClientOriginalName();
            $file->move('assets/uploads/sub-category/', $imgname);
            $subcategory->image = $imgname;
        }
        $subcategory->cat_id = $request->input('cat_id');
        $subcategory->name = $request->input('name');
        $subcategory->slug = $request->input('slug');
        $subcategory->description = $request->input('description');
        $subcategory->status = $request->input('status') == TRUE ? '1' : '0';
        $subcategory->popular = $request->input('popular') == TRUE ? '1' : '0';
        $subcategory->save();

        return redirect('sub-category')->with('timer', "Brand Added Successfully");
    }
    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory'));
    }
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/sub-category/' . $subcategory->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $imgname = $file->getClientOriginalName();
            $file->move('assets/uploads/sub-category/', $imgname);
            $subcategory->image = $imgname;
        }
        $subcategory->name = $request->input('name');
        $subcategory->slug = $request->input('slug');
        $subcategory->description = $request->input('description');
        $subcategory->status = $request->input('status') == TRUE ? '1' : '0';
        $subcategory->popular = $request->input('popular') == TRUE ? '1' : '0';
        $subcategory->update();
        return redirect('sub-category')->with('timer', "Brand Updated Successfully");
    }
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        if ($subcategory->image) {     // if sub category has image
            $path = 'assets/uploads/category/' . $subcategory->image;
            if (File::exists($path)) {      // if image exists
                File::delete($path);
            }
        }
        $subcategory->delete();
        return redirect('sub-category')->with('timer', "Brand Deleted Successfully");
    }
}
