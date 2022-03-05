@extends('layouts.retailer')

@section('title')
    View Order
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0 bg-secondary">
                        <h3 class="text-white">Order View
                            <a href="{{ url('retailer/dashboard') }}" class="btn btn-warning float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label>First Name</label>
                                <div class="border px-2">{{ $orders->fname }}</div>
                                <label>Last Name</label>
                                <div class="border px-2">{{ $orders->lname }}</div>
                                <label>E-mail</label>
                                <div class="border px-2">{{ $orders->email }}</div>
                                <label>Contact No.</label>
                                <div class="border px-2">{{ $orders->phone }}</div>
                                <label>Shipping Address</label>
                                <div class="border px-2">
                                    {{ $orders->address1 }},<br>
                                    {{ $orders->address2 }},<br>
                                    {{ $orders->city }},<br>
                                    {{ $orders->state }},
                                    {{ $orders->country }}
                                </div>
                                <label>Zip Code</label>
                                <div class="border">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <div class="order-details">
                                    <label>Tracking No.</label>
                                    <div class="border">{{ $orders->tracking_no }}</div>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products ? $item->products->name : '' }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>Rs. {{ number_format($item->price) }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                                        alt="product img" width="100">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <h4 class="px-2">Grand Total: <span class="float-end"><b>Rs.
                                            {{ number_format($orders->total_price) }}</b></span></h4>
                                <div class="mt-3 px-2">
                                    <label for="">Order Status:</label>
                                    <form action="{{ url('retailer/update-order/' . $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            @if ($orders->order_status == '0')
                                                <option {{ $orders->order_status == '0' ? 'selected' : '' }} value="0"
                                                    disabled>
                                                    Confirmed
                                                </option>
                                                <option {{ $orders->order_status == '1' ? 'selected' : '' }} value="1">
                                                    Packed
                                                </option>
                                            @endif
                                            @if ($orders->order_status == '1')
                                                <option {{ $orders->order_status == '1' ? 'selected' : '' }} value="1"
                                                    disabled>
                                                    Packed
                                                </option>
                                                <option {{ $orders->order_status == '2' ? 'selected' : '' }} value="2">
                                                    Shipped
                                                </option>
                                            @endif
                                        </select>
                                        @if ($orders->order_status != '3')
                                            <button type="submit" class="btn btn-primary mt-2 float-end">Update</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
