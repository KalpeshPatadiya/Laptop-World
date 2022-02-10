<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function vieworder(Request $request, $id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }

    public function invoice($order_id)
    {
        if (Order::where('id', $order_id)->exists()) {
            $orders = Order::find($order_id);
            $id = $orders->tracking_no;
            $data = [
                'orders' => $orders,
            ];
            $pdf = PDF::loadView('frontend.orders.invoice', $data);

            return $pdf->download('Invoice - ' . $id . '.pdf');
        }
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

    public function SearchautoComplete(Request $request)
    {
        $query = $request->get('term', '');
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->where('status', '1')->get();

        $data = [];
        foreach ($products as $items) {
            $data[] = [
                'value' => $items->name,
                'id' => $items->id
            ];
        }
        if (count($data)) {
            return $data;
        } else {
            return ['value' => 'No result found', 'id' => ''];
        }
    }
    public function result(Request $request)
    {
        $searchingdata = $request->input('search_product');
        $products = Product::where('name', 'LIKE', '%' . $searchingdata . '%')->where('status', '1')->first();
        if ($products) {
            if (isset($_POST['searchbtn'])) {
                return redirect('collection/' . $products->subcategory->category->slug . '/' .
                    $products->subcategory->slug);
            } else {
                return redirect('collection/' . $products->subcategory->category->slug . '/' .
                    $products->subcategory->slug . '/' . $products->slug);
            }
        } else {
            return redirect('/')->with('status', "Product Not Available");
        }
    }

    public function cancelorder(Request $request, $id)
    {
        // $orders = Order::find($id);
        // $orders->cancellation_reason = $request->input('cancel_reason');
        // $orders->order_status = "3";
        $prod_id = $request->input('prod_id');
        $products = Product::where('id', $prod_id)->get();
        $new_qty = $request->input('quantity1');
        $products->quantity =  $new_qty;
        // $orders->save();
        $products->update();
        return redirect('my-orders')->with('status', 'Order Cancelled');
    }
}
