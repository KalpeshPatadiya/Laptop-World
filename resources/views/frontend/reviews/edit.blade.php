@extends('layouts.front')

@section('title', 'Edit your review')

@section('content')

    <div class="py-2 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Collection
                </a> /
                <a href="{{ url('collection/' . $review->product->subcategory->category->slug) }}">
                    {{ $review->product->subcategory->category->name }}
                </a> /
                <a
                    href="{{ url('collection/' . $review->product->subcategory->category->slug . '/' . $review->product->subcategory->slug) }}">
                    {{ $review->product->subcategory->name }}
                </a> /
                <a
                    href="{{ url('collection/' . $review->product->subcategory->category->slug . '/' . $review->product->subcategory->slug . '/' . $review->product->slug) }}">
                    {{ $review->product->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card glass">
                    <div class="card-body">
                        <h5>You will be writing a review for {{ $review->product->name }}</h5>
                        <form action="{{ url('/update-review') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <textarea name="user_review" rows="5" class="form-control glass-card"
                                placeholder="What did you like or dislike? What did you use this product for?"
                                required>{{ $review->user_review }}</textarea>
                            <button class="btn btn-primary mt-3">Update Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
