@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-2 mb-4 shadow-sm bg-info border-top">
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
        <div class="card glass shadhow p-0">
            <div class="cartitemsR">
                @if ($cartItems->count() > 0)
                    <div class="card-body">
                        @php
                            $total = 0;
                        @endphp
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 266px;">Image</th>
                                    <th style="width: 355px;">Name</th>
                                    <th style="width: 136px;">Price</th>
                                    <th style="width: 245px;">Quantity</th>
                                    <th style="width: 145px;">SubTotal</th>
                                    <th style="width: 10px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                        <hr>
                        @foreach ($cartItems as $item)
                            <div class="row product_data d-flex justify-content-around">
                                <div class="col-md-2">
                                    <a
                                        href="{{ url('collection/' .$item->products->subcategory->category->slug .'/' .$item->products->subcategory->slug .'/' .$item->products->slug) }}">
                                        <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt=""
                                            class="cart-img">
                                    </a>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <a
                                        href="{{ url('collection/' .$item->products->subcategory->category->slug .'/' .$item->products->subcategory->slug .'/' .$item->products->slug) }}">
                                        <h4>{{ $item->products->name }}</h4>
                                    </a>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <h6><strong>₹ {{ number_format($item->products->price) }}</strong></h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                    @if ($item->products->quantity >= $item->prod_qty)
                                        <label for="Quantity">Quantity</label>
                                        <div class="input-group mb-3" style="width: 60%;">
                                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                                            <input type="text" name="quantity" value="{{ $item->prod_qty }}"
                                                class="form-control qty-input glass-card" readonly>
                                            <button class="input-group-text changeQuantity increment-btn"
                                                data-max-qty="{{ $item->products->quantity }}">+</button>
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
                                    <h6><strong>₹ {{ number_format($prod_total) }}</strong></h6>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <button class="btn btn-outline-danger delete-cart-item"><i class="fa fa-trash"></i>
                                        </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer pb-3">
                        <div class="fs-4 mt-2">Total Price : ₹ {{ number_format($total) }}
                            <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end btn-delete">Checkout</a>
                        </div>
                    </div>
                @else
                    <div class="card-body text-center">
                        <h2 class="my-4">Your <i class="fa fa-shopping-cart text-success"></i> Cart is empty</h2>
                        <a href="{{ url('collection') }}" class="btn btn-outline-primary btn-delete mb-2 float-end">Continue
                            Shopping</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="container glass mt-5">
            <div class="row">
                <h2>Products you may like...</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card card-effect card-none card-shadow m-2 glass-card">
                                <a
                                    href="{{ url('collection/' . $prod->subcategory->category->slug . '/' . $prod->subcategory->slug . '/' . $prod->slug) }}">
                                    <img class="card-img-top zoom-in"
                                        src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="product image">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start"><b>₹ {{ number_format($prod->price) }}</b></span>
                                        <span class="ms-4"><s><b>₹
                                                </b>{{ number_format($prod->MRP) }}</s></span>
                                        @php
                                            $discount = (($prod->MRP - $prod->price) / $prod->MRP) * 100;
                                        @endphp
                                        <span class="float-end text-success">{{ number_format($discount) }}% off</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            smartSpeed: 1500,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
@endsection
