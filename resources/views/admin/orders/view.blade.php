@extends('layouts.admin')

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
                            <a href="{{ url('orders') }}" class="btn btn-warning float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label>First Name</label>
                                <div class="border">{{ $orders->fname }}</div>
                                <label>Last Name</label>
                                <div class="border">{{ $orders->lname }}</div>
                                <label>E-mail</label>
                                <div class="border">{{ $orders->email }}</div>
                                <label>Contact No.</label>
                                <div class="border">{{ $orders->phone }}</div>
                                <label>Shipping Address</label>
                                <div class="border">
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
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/' . $item->products ? @$item->products->image : '') }}"
                                                        alt="product img" width="100"
                                                        onerror="this.src='https://via.placeholder.com/150/FF0000/FFFFFF?Text=noimage'" />
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <h4 class="px-2">Grand Total: <span class="float-end"><b>₹
                                            {{ $orders->total_price }}</b></span></h4>
                                <div class="mt-5 px-2">
                                    <label for="">Order Status:</label>
                                    <form action="{{ url('update-order/' . $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            @if($orders->order_status != '3')
                                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Shipped
                                            </option>
                                            <option {{ $orders->status == '2' ? 'selected' : '' }} value="2">Completed
                                            </option>
                                            <option {{ $orders->status == '3' ? 'selected' : '' }} value="3">Cancelled
                                            </option>
                                            @else 
                                            <option {{ $orders->status == '3' ? 'selected' : '' }} value="3">Cancelled
                                            </option>
                                            @endif
                                        </select>
                                        <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
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
