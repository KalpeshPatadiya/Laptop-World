@extends('layouts.front')

@section('title', $products->name)

@section('content')
    <div class="modal fade" id="RatingModal" tabindex="-1" aria-labelledby="RatingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-card text-white">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="RatingModalLabel">Rate {{ $products->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                        <input type="radio" value="{{ $j }}" name="product_rating"
                                            id="rating{{ $j }}">
                                        <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-2 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Collection
                </a> /
                <a href="{{ url('collection/' . $products->subcategory->category->slug) }}">
                    {{ $products->subcategory->category->name }}
                </a> /
                <a
                    href="{{ url('collection/' . $products->subcategory->category->slug . '/' . $products->subcategory->slug) }}">
                    {{ $products->subcategory->name }}
                </a> /
                <a
                    href="{{ url('collection/' . $products->subcategory->category->slug . '/' . $products->subcategory->slug . '/' . $products->slug) }}">
                    {{ $products->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="container pb-4">
        <div class="card glass shadow product_data p-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 pt-4">
                        <img style="width: 420px; justify-content: center;" src="{{ asset('assets/uploads/products/' . $products->image) }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">{{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size: 16px;"
                                    class="float-end badge bg-danger trending_tag">Trending</label>
                            @elseif ($products->new_arrivals == '1')
                                <label style="font-size: 16px;" class="float-end badge bg-info new_tag">New</label>
                            @endif
                        </h2>
                        <hr>
                        @php $ratenum = number_format($rating_value) @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $ratenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $ratenum + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if ($ratings->count() > 0)
                                    {{ $ratings->count() }} Ratings
                                @else
                                    <span>No Ratings</span>
                                @endif
                            </span>
                        </div>
                        <label class="fw-bold fs-4"> ₹
                            {{ number_format($products->price) }}</label>&nbsp;&nbsp;&nbsp;
                        <label class="me-3"><s>₹ {{ number_format($products->MRP) }}</s></label>
                        @php
                            $discount = (($products->MRP - $products->price) / $products->MRP) * 100;
                        @endphp
                        <label class="me-3 text-success fw-bold">{{ number_format($discount) }}% off</label>
                        @if ($products->quantity < 5 && $products->quantity > 0)
                            <br><span class="text-danger">Hurry, only {{ $products->quantity }} left!!!</span>
                        @endif
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if ($products->quantity > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control glass-card qty-input">
                                    <button class="input-group-text increment-btn"
                                        data-max-qty="{{ $products->quantity }}">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                @if ($products->quantity > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn CartBtn float-start">Add
                                        to Cart
                                        <i class="fa fa-shopping-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 addToWishlist CartBtn float-start">Add to
                                    Wishlist
                                    <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        @if ($products->des_heading != '')
                            <div class="card glass-card my-3">
                                <details open>
                                    <summary class="card-header fs-3">{{ $products->des_heading }}</summary>
                                    <div class="card-body">
                                        {!! $products->description !!}
                                    </div>
                                </details>
                            </div>
                        @endif
                        @if ($products->det_heading != '')
                            <div class="card glass-card my-3">
                                <details>
                                    <summary class="card-header fs-3">{{ $products->det_heading }}</summary>
                                    <div class="card-body">
                                        {!! $products->details !!}
                                    </div>
                                </details>
                            </div>
                        @endif
                    </div>
                    <hr>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#RatingModal">
                            Rate this product
                        </button>
                        <button type="button" class="btn btn-info ms-4" style="padding: unset;">
                            <a href="{{ url('add-review/' . $products->slug . '/userreview') }}" class="btn btn-link">
                                Write a review
                            </a>
                        </button>
                    </div>
                    <div class="col-md-8 @if ($reviews->count() >= 4) user-review @endif">
                        @foreach ($reviews as $item)
                            <div>
                                @if ($item->review_status == '1')
                                    <label
                                        class="fw-bold">{{ $item->user->name . ' ' . $item->user->lname }}</label>
                                    @if ($item->user_id == Auth::id())
                                        <a href="{{ url('edit-review/' . $products->slug . '/userreview') }}">
                                            <button type="button" class="btn btn-warning float-end"
                                                style="padding: 3px 12px;">
                                                Edit
                                            </button>
                                        </a>
                                    @endif
                                    <br>
                                    @php
                                        $rating = App\Models\Rating::where('prod_id', $products->id)
                                            ->where('user_id', $item->user->id)
                                            ->first();
                                    @endphp
                                    @if ($rating)
                                        @php $user_rated = $rating->stars_rated @endphp
                                        @for ($i = 1; $i <= $user_rated; $i++)
                                            <i class="fa fa-star checked"></i>
                                        @endfor
                                        @for ($j = $user_rated + 1; $j <= 5; $j++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    @endif
                                    <small><em>Reviewed on {{ $item->updated_at->format('d M Y') }}</em></small>
                                    <p>
                                        {{ $item->user_review }}
                                    </p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <section class="py-4 container glass">
        <div class="row">
            <div class="col-md 12">
                <h4 class="fw-bold">Related Products</h4>
                <hr>
                <div class="owl-carousel related-carousel owl-theme">
                    @foreach ($products->subcategory->category->products as $item)
                        @if ($item->id != $products->id)
                        @if ($item->price <= $products->price*2 && $item->price >= $products->price/2)
                            <div class="item">
                                <div class="card card-effect card-none card-shadow m-2 glass-card">
                                    <a
                                        href="{{ url('collection/' . $item->subcategory->category->slug . '/' . $item->subcategory->slug . '/' . $item->slug) }}">
                                        <img class="card-img-top zoom-in"
                                            src="{{ asset('assets/uploads/products/' . $item->image) }}"
                                            alt="product image">
                                        <div class="card-body">
                                            <h5>{{ $item->name }}</h5>
                                            <span class="float-start"><b>₹
                                                    {{ number_format($item->price) }}</b></span>
                                            <span class="ms-4"><s><b>₹
                                                    </b>{{ number_format($item->MRP) }}</s></span>
                                            @php
                                                $discount = (($item->MRP - $item->price) / $item->MRP) * 100;
                                            @endphp
                                            <span class="float-end text-success">{{ number_format($discount) }}%
                                                off</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('.related-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
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
