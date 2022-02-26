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
        <div class="card glass p-0 shadhow cartitemsR">
            @if ($cartItems->count() > 0)
                <div class="card-body">
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
                                <h6><strong>₹ {{ $item->products->price }}</strong></h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if ($item->products->quantity >= $item->prod_qty)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group mb-3" style="width: 60%;">
                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        <input type="text" name="quantity" value="{{ $item->prod_qty }}"
                                            class="form-control qty-input glass-card">
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
                        <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end btn-delete">Checkout</a>
                    </h5>
                </div>
            @else
                <div class="card-body text-center">
                    <h2 class="my-4">Your <i class="fa fa-shopping-cart text-success"></i> Cart is empty</h2>
                    <a href="{{ url('collection') }}" class="btn btn-outline-primary btn-delete float-end">Continue
                        Shopping</a>
                </div>
            @endif
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
                                        <span class="float-start"><b>₹</b> {{ $prod->price }}</span>
                                        <span class="float-end"><b>₹ </b><s>{{ $prod->MRP }}</s></span>
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
