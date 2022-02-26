@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content glass p-0 text-white">
                <form action="{{ url('cancel-order/' . $orders->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach ($orders->orderitems as $item)
                        <input type="hidden" name="prod_id" value="{{ $item->prod_id }}">
                        <input type="hidden" name="quantity1" value="{{ $item->qty }}">
                    @endforeach

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cancel order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure? <br />
                        If yes, please state Cancellation Reason :
                        <select name="cancel_reason" id="custom-select" required id="inputGroup1">
                            <option value="">-- Select --</option>
                            <option value="Accidentally placed order">Accidentally placed order</option>
                            <option value="Delayed order">Delayed order</option>
                            <option value="Not Interested in this product">Not Interested in this product</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-2 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('my-orders') }}">
                    My Orders
                </a>
            </h6>
        </div>
    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card glass p-0">
                    <div class="card-header">
                        <h3>Order View
                            <a href="{{ url('my-orders') }}" class="btn btn-warning float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 ms-5 order-details glass">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label>First Name</label>
                                <div class="border glass">{{ $orders->fname }}</div>
                                <label>Last Name</label>
                                <div class="border glass">{{ $orders->lname }}</div>
                                <label>E-mail</label>
                                <div class="border glass">{{ $orders->email }}</div>
                                <label>Contact No.</label>
                                <div class="border glass">{{ $orders->phone }}</div>
                                <label>Shipping Address</label>
                                <div class="border glass">
                                    {{ $orders->address1 }},<br>
                                    {{ $orders->address2 }},<br>
                                    {{ $orders->city }},<br>
                                    {{ $orders->state }},
                                    {{ $orders->country }}
                                </div>
                                <label>Zip Code</label>
                                <div class="border glass">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6 glass ms-2">
                                <h4>Order Details</h4>
                                <hr>
                                <div class="order-details mb-3">
                                    <label>Tracking No. </label>
                                    <div class="border glass">{{ $orders->tracking_no }}</div>
                                </div>
                                <table class="table table-bordered glass-card">
                                    <thead class="table-info">
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                                        alt="product img" width="100">
                                                </td>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand Total: <span class="float-end"><b>₹
                                            {{ $orders->total_price }}</b></span></h4>
                                @if ($orders->order_status == '0')
                                    <a href="" class="btn btn-warning float-end" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Cancel order</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
