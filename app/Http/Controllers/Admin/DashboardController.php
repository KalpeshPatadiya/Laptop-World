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

    public function viewreview(Request $request)
    {
        $review_id = $request->input('review_id');
        $review = Review::where('id', $review_id)->first();
        return response()->json(['status' => $review->user_review ]);
    }

    public function hidereview($id)
    {
        $reviews = Review::find($id);
        $reviews->review_status = 0;
        $reviews->update();
        return redirect('reviews')->with('timer', "Review Hide Successfully");
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
        return redirect('reviews')->with('timer', "Review Updated Successfully");
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

    public function updateuser(Request $request, $id)
    {
        $users = User::find($id);
        $users->role_as = $request->input('role_as');
        $users->update();
        return redirect('users')->with('timer', "Role Updated Successfully");
    }
}
