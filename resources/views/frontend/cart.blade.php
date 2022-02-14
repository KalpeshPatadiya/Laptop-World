@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('cart') }}">
                    Cart
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-4">
        <div class="col-md-12">
            <h3><strong>My Cart</strong></h3>
        </div>
        <div class="card shadhow cartitemsR">
            @if ($cartItems->count() > 0)
                <div class="card-body">
                    {{-- <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>SubTotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td><img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt=""
                                            class="cart-img"></td>
                                    <td>{{ $item->products->name }}</td>
                                    <td>
                                        <h6><strong>₹ {{ $item->products->price }}</strong></h6>
                                    </td>
                                    <td>
                                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                        @if ($item->products->quantity >= $item->prod_qty)
                                            <label for="Quantity">Quantity</label>
                                            <div class="input-group mb-3" style="width: 60%;">
                                                <button class="input-group-text changeQuantity decrement-btn">-</button>
                                                <input type="text" name="quantity" value="{{ $item->prod_qty }}"
                                                    class="form-control qty-input">
                                                <button class="input-group-text changeQuantity increment-btn">+</button>
                                            </div>
                                            @php
                                                $total += $item->products->price * $item->prod_qty;
                                            @endphp
                                        @else
                                            <h5>Out of Stock</h5>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $prod_total = $item->products->price * $item->prod_qty;
                                        @endphp
                                        <h6><strong>₹ {{ $prod_total }}</strong></h6>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i>
                                            Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    @php
                        $total = 0;
                    @endphp
                    <div class="row justify-content-around">
                        <div class="col-md-2">
                            <h5><strong>Image</strong></h5>
                        </div>
                        <div class="col-md-3">
                            <h5><strong>Name</strong></h5>
                        </div>
                        <div class="col-md-1">
                            <h5><strong>Price</strong></h5>
                        </div>
                        <div class="col-md-2">
                            <h5><strong>Quantity</strong></h5>
                        </div>
                        <div class="col-md-auto">
                            <h5><strong>SubTotal</strong></h5>
                        </div>
                        <div class="col-md-1">
                            <h5><strong>Action</strong></h5>
                        </div>
                    </div>
                    <hr>
                    @foreach ($cartItems as $item)
                        <div class="row product_data d-flex justify-content-around">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt=""
                                    class="cart-img">
                            </div>
                            <div class="col-md-3 my-auto">
                                <h4>{{ $item->products->name }}</h4>
                            </div>
                            <div class="col-md-1 my-auto">
                                <h6><strong>₹ {{ $item->products->price }}</strong></h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if ($item->products->quantity >= $item->prod_qty)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group mb-3" style="width: 60%;">
                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        <input type="text" name="quantity" value="{{ $item->prod_qty }}"
                                            class="form-control qty-input">
                                        <button class="input-group-text changeQuantity increment-btn">+</button>
                                    </div>
                                    @php
                                        $total += $item->products->price * $item->prod_qty;
                                    @endphp
                                @else
                                    <h5>Out of Stock</h5>
                                @endif
                            </div>
                            <div class="col-md-1 my-auto">
                                @php
                                    $prod_total = $item->products->price * $item->prod_qty;
                                @endphp
                                <h6><strong>₹ {{ $prod_total }}</strong></h6>
                            </div>
                            <div class="col-md-auto my-auto">
                                <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i>
                                    Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <h5>Total Price : ₹ {{ $total }}
                        <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Checkout</a>
                    </h5>
                </div>
            @else
                <div class="card-body text-center">
                    <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
                    <a href="{{ url('collection') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
@endsection
