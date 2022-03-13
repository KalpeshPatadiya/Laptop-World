@extends('layouts.front')

@section('title', 'Write a review')

@section('content')

    <div class="py-3 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Collection
                </a> /
                <a href="{{ url('collection/' . $product->subcategory->category->slug) }}">
                    {{ $product->subcategory->category->name }}
                </a> /
                <a
                    href="{{ url('collection/' . $product->subcategory->category->slug . '/' . $product->subcategory->slug) }}">
                    {{ $product->subcategory->name }}
                </a> /
                <a
                    href="{{ url('collection/' . $product->subcategory->category->slug . '/' . $product->subcategory->slug . '/' . $product->slug) }}">
                    {{ $product->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card glass">
                    <div class="card-body">
                        @if ($delivered_order->count() > 0)
                            <h5>You will be writing a review for {{ $product->name }}</h5>
                            <form action="{{ url('/add-review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea name="user_review" rows="5" class="form-control glass-card"
                                    placeholder="What did you like or dislike? What did you use this product for?" required></textarea>
                                <button class="btn btn-primary mt-3">Submit Review</button>
                            </form>
                        @elseif ($cancelled_order->count() > 0)
                            <h4 class="text-danger">You have cancelled your order</h4>
                            <p>
                                You cannot write a review after you cancelled the order.
                            </p>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-dark mt-3 btn-delete">Go Back</a>
                        @elseif ($verified_purchase->count() > 0)
                            <h4 class="text-success">You have purchased {{ $product->name }}</h4>
                            <p>
                                You can write a review after you use {{ $product->name }} i.e for the trust worthiness of the reviews.
                            </p>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-dark mt-3 btn-delete">Go Back</a>
                        @else
                            <h4 class="text-danger">You are not eligible to review {{ $product->name }}</h4>
                            <p>
                                For the trust worthiness of the reviews, only customers who purchased
                                the product can write a review about the product
                            </p>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-dark mt-3 btn-delete">Go Back</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
