@extends('layouts.front')

@section('title', "Write a review")

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purchase->count()  > 0)
                    <h5>You will be writing a review for {{ $product->name }}</h5>
                    <form action="{{ url('/add-review') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea name="user_review" rows="5" class="form-control" placeholder="What did you like or dislike? What did you use this product for?"></textarea>
                        <button class="btn btn-primary mt-3">Submit Review</button>
                    </form>
                    @else 
                    <h5>You are not eligible to review this product</h5>
                    <p>
                        For the trust worthiness of the reviews, only customers who purchased
                        the product can write a review about the product
                    </p>
                    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go to home page</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
