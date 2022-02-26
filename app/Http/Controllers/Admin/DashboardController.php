<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $reviews = Review::where('review_status', '1')->get();
        return view('admin.review.index', compact('reviews'));
    }

    public function hidereview($id)
    {
        $reviews = Review::find($id);
        $reviews->review_status = 0;
        $reviews->update();
        return redirect('reviews')->with('status', "Review Hide Successfully");
    }

    public function hiddenreviews()
    {
        $reviews = Review::where('review_status', '0')->get();
        return view('admin.review.hidden', compact('reviews'));
    }

    public function showreview($id)
    {
        $reviews = Review::find($id);
        $reviews->review_status = 1;
        $reviews->update();
        return redirect('reviews')->with('status', "Review Updated Successfully");
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function viewuser($id)
    {
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }

    public function edituser($id)
    {
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
    }

    public function updateuser(Request $request, $id)
    {
        $users = User::find($id);
        $users->role_as = $request->input('roles');
        $users->update();
        return redirect('users')->with('status', "Role Updated Successfully");
    }
}
