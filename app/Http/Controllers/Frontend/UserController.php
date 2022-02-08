<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function vieworder($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }

    public function invoice($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.invoice', compact('orders'));
    }

    public function myprofile()
    {
        $profile = Auth::user();
        return view('frontend.profile.index', compact('profile'));
    }

    public function editprofile()
    {
        $profile = Auth::user();
        return view('frontend.profile.edit', compact('profile'));
    }

    public function updateprofile(Request $request)
    {
        $date = date('y-m-d', strtotime($request->dob));
        $profile = User::find(Auth::id());
        $profile->name = $request->input('fname');
        $profile->lname = $request->input('lname');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->gender = $request->input('gender');
        $profile->dob = $date;
        $profile->address1 = $request->input('address1');
        $profile->address2 = $request->input('address2');
        $profile->city = $request->input('city');
        $profile->state = $request->input('state');
        $profile->country = $request->input('country');
        $profile->pincode = $request->input('pincode');
        $profile->save();
        return redirect('my-profile')->with('status', 'Profile updated Successfully');
    }

    public function adminprofile()
    {
        $profile = User::find(Auth::id());
        return view('admin.profile.index', compact('profile'));
    }
}
