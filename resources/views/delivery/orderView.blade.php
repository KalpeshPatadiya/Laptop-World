@extends('layouts.delivery')

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
                            <a href="{{ url('delivery/dashboard') }}" class="btn btn-warning float-end">Back</a>
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
                                <div class="mt-3 px-2 order-details">
                                    <label for="">Order Status:</label>
                                    @if ($orders->order_status == 3)
                                        <div class="border mb-2">Out for Delivery</div>
                                    @endif
                                    @if ($orders->order_status == 5)
                                        <div class="border mb-2 text-danger">Not delivered</div>
                                    @endif
                                    <form action="{{ url('delivery/update-order/' . $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        {{-- Delivered modal --}}
                                        <div class="modal fade" id="delivery_modal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Is order
                                                            delivered?
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body mt-2 mb-3">
                                                        Select "Yes" if order has been delivered.<br>
                                                        @if ($orders->order_status == 3)
                                                            Select "No" if order has been not delivered.
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="order_status" value="4">
                                                        <button type="submit" class="btn btn-success"
                                                            data-bs-dismiss="modal">Yes</button>
                                                        @if ($orders->order_status == 3)
                                                            <button type="button" class="btn btn-danger float-end"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#not_delivered">No</button>
                                                        @endif
                                                        @if ($orders->order_status == 5)
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">No</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="{{ url('delivery/update-order/' . $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        {{-- not-delivered modal --}}
                                        <div class="modal fade" id="not_delivered" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Why is order
                                                            not delivered?
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body mt-2 mb-3">
                                                        please state the reason, Why order is not delivered? :
                                                        <select name="not_delivered_reason" id="custom-select" required
                                                            id="inputGroup1">
                                                            <option value="">-- Select --</option>
                                                            <option value="recipient not available">Recipient not
                                                                available</option>
                                                            <option value="recipient address not found">Recipient
                                                                address not found</option>
                                                            <option value="working hours exceeded">Working hours
                                                                exceeded</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="order_status" value="5">
                                                        <button type="submit" class="btn btn-success"
                                                            data-bs-dismiss="modal">Ok</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="" class="btn btn-warning float-end" data-bs-toggle="modal"
                                            data-bs-target="#delivery_modal">Delivered</a>
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
