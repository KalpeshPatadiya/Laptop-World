@extends('layouts.front')

@section('title')
    My Wishlist
@endsection

@section('content')
    <div class="py-2 mb-4 shadow-sm bg-info border-top">
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
        <div class="card glass p-0 shadhow">
            <div class="wishlistitemsR">
                <div class="card-body">
                    @if ($wishlist->count() > 0)
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 266px;">Image</th>
                                    <th style="width: 370px;">Name</th>
                                    <th style="width: 160px;">Price</th>
                                    <th style="width: 160px;">Availibility</th>
                                    <th style="width: 205px;">Add to Cart</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                        <hr>
                        @foreach ($wishlist as $item)
                            <div class="row product_data d-flex justify-content-between">
                                <div class="col-md-2">
                                    <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt=""
                                        class="cart-img">
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
                                <div class="col-md-1 my-auto">
                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                    @if ($item->products->quantity >= $item->prod_qty)
                                        <h5>In Stock</h5>
                                        <input type="hidden" name="quantity" value="1" class="form-control qty-input">
                                    @else
                                        <h5>Out of Stock</h5>
                                    @endif
                                </div>
                                <div class="col-md-auto my-auto">
                                    <button class="btn btn-success addToCartBtnFW CartBtn"><i
                                            class="fa fa-shopping-cart"></i>
                                        Add to Cart</button>
                                </div>
                                <div class="col-md-auto my-auto">
                                    <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i>
                                        Remove</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card-body text-center">
                            <h2 class="my-4">Your <i class="fa fa-heart text-danger"></i> Wishlist is empty</h2>
                            <a href="{{ url('/') }}" class="btn btn-outline-primary btn-delete float-end">Explore
                                products</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
