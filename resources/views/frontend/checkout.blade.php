@extends('layouts.front')

@section('title')
    Checkout Page
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('checkout') }}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>

    <div class="container pb-5">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="bg-white mb-3">
                    <a href="{{ url('cart') }}" class="btn btn-warning float-end">Back</a>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 mt-3">
                                    <label for="name_validate">First Name</label>
                                    <input type="text" id="name_validate" class="form-control"
                                        value="{{ Auth::user()->name }}" name="fname" required
                                        placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="lname_validate">Last Name</label>
                                    <input type="text" id="lname_validate" class="form-control"
                                        value="{{ Auth::user()->lname }}" name="lname" required
                                        placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email_validate">Email</label>
                                    <input type="text" id="email_validate" class="form-control"
                                        value="{{ Auth::user()->email }}" name="email" required placeholder="Enter Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="phone_validate">Phone Number</label>
                                    <input type="text" id="phone_validate" class="form-control"
                                        value="{{ Auth::user()->phone }}" name="phone" required
                                        placeholder="Enter Phone Number">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="add1_validate">Address 1</label>
                                    <input type="text" id="add1_validate" class="form-control"
                                        value="{{ Auth::user()->address1 }}" name="address1" required
                                        placeholder="Enter Address 1">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="add2_validate">Address 2</label>
                                    <input type="text" id="add2_validate" class="form-control"
                                        value="{{ Auth::user()->address2 }}" name="address2" required
                                        placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="city_validate">City</label>
                                    <input type="text" id="city_validate" class="form-control"
                                        value="{{ Auth::user()->city }}" name="city" required placeholder="Enter City">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="state_validate">State</label>
                                    <input type="text" id="state_validate" class="form-control"
                                        value="{{ Auth::user()->state }}" name="state" required
                                        placeholder="Enter State">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="country_validate">Country</label>
                                    <input type="text" id="country_validate" class="form-control"
                                        value="{{ Auth::user()->country }}" name="country" required
                                        placeholder="Enter Country">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="pin_validate">Pin Code</label>
                                    <input type="text" id="pin_validate" class="form-control"
                                        value="{{ Auth::user()->pincode }}" name="pincode" required
                                        placeholder="Enter Pin Code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5>Order Details</h5>
                            <hr>
                            @if ($cartitems->count() > 0)
                                @php
                                    $total = 0;
                                @endphp
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- {{ $item->total_price = $item->price * $item->quantity }} --}}
                                        @foreach ($cartitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->prod_qty }}</td>
                                                <td>{{ $item->products->price }}</td>
                                            </tr>
                                            {{-- {{ $item->total_price += $item->products->price * $item->prod_qty }} --}}
                                            @php
                                                $total += $item->products->price * $item->prod_qty;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="2">Total</td>
                                            {{-- <td>{{ $item->total_price }}</td> --}}
                                            <td>{{ $total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <button type="submit" class="btn btn-primary w-100 float-end">Place Order</button>
                            @else
                                <h3 class="text-center">No Items in Cart</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
