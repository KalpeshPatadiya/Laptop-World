@extends('layouts.front')

@section('title')
    My Wishlist
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('wishlist') }}">
                    Wishlist
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-4">
        <div class="col-md-12">
            <h3><strong>My Wishlist</strong></h3>
        </div>
        <div class="card shadhow wishlistitemsR">
            <div class="card-body">
            @if($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                        <div class="row product_data d-flex justify-content-between">
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
                            <div class="col-md-1 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if ($item->products->quantity >= $item->prod_qty)
                                    <h5>In Stock</h5>
                                        <input type="hidden" name="quantity" value="1"
                                            class="form-control qty-input">
                                @else
                                    <h5>Out of Stock</h5>
                                @endif
                            </div>
                            <div class="col-md-auto my-auto">
                                <button class="btn btn-success addToCartBtnFW"><i class="fa fa-shopping-cart"></i>
                                    Add to Cart</button>
                            </div>
                            <div class="col-md-auto my-auto">
                                <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i>
                                    Remove</button>
                            </div>
                        </div>
                    @endforeach
            @else 
                <h4>Wishlist is empty</h4>
            @endif
            </div>
        </div>
    </div>
@endsection
