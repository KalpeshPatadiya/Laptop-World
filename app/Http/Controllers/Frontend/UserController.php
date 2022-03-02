<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CancelOrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
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
        $profile->save();
        return redirect('my-profile')->with('success', 'Profile updated Successfully');
    }
    public function deleteacc($id)
    {
        $profile = User::find($id);
        $profile->delete();
        return redirect('/')->with('success', "Your account is successfully deleted and you will never be able to login with that account");
    }

    public function adminprofile()
    {
        $profile = User::find(Auth::id());
        return view('admin.profile.index', compact('profile'));
    }

    public function editadminprofile()
    {
        $profile = User::find(Auth::id());
        return view('admin.profile.edit', compact('profile'));
    }

    public function updateadminprofile(Request $request)
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
        return redirect('admin-profile')->with('timer', 'Profile updated Successfully');
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
        if ($searchingdata != "") {
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
                return redirect('/')->with('error', "Product Not Available");
            }
        } else {
            return redirect()->back();
        }
    }

    public function cancelorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->cancellation_reason = $request->input('cancel_reason');
        $orders->order_status = "3";
        $orders->update();

        $orderitems = OrderItem::where('order_id', $id)->get();
        foreach ($orderitems as $item) {
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->quantity = $prod->quantity + $item->qty;
            $prod->update();
        }

        Mail::to($orders->email)->send(new CancelOrderMail($orders, $orderitems));

        return redirect('my-orders')->with('success', 'Order Cancelled');
    }
}
