@extends('layouts.front')

@section('title', 'Write a review')

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('collection') }}">
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

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($verified_purchase->count() > 0)
                            <h5>You will be writing a review for {{ $product->name }}</h5>
                            <form action="{{ url('/add-review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea name="user_review" rows="5" class="form-control"
                                    placeholder="What did you like or dislike? What did you use this product for?"></textarea>
                                <button class="btn btn-primary mt-3">Submit Review</button>
                            </form>
                        @else
                            <h4 class="text-danger">You are not eligible to review {{ $product->name }}</h4>
                            <p>
                                For the trust worthiness of the reviews, only customers who purchased
                                the product can write a review about the product
                            </p>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-dark mt-3">Go Back</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
