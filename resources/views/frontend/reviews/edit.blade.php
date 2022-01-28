@extends('layouts.front')

@section('title', "Edit your review")

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>You will be writing a review for {{ $review->product->name }}</h5>
                    <form action="{{ url('/update-review') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                        <textarea name="user_review" rows="5" class="form-control" placeholder="What did you like or dislike? What did you use this product for?">{{ $review->user_review }}</textarea>
                        <button class="btn btn-primary mt-3">Update Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
