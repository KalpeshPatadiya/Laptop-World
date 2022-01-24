@extends('layouts.front')

@section('title')
    Welcome to LaptopWorld
@endsection

@section('content')
    @include('layouts.include.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card">
                                <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
                                    <img class="card-img-top"
                                        src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="product image">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start"><b>₹</b> {{ $prod->price }}</span>
                                        <span class="float-end"><b>₹</b><s> {{ $prod->MRP }}</s></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Categories</h2>
                <div class="owl-carousel trending-carousel owl-theme">
                    @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a href="{{ url('category/' . $tcategory->slug) }}">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="{{ asset('assets/uploads/category/' . $tcategory->image) }}"
                                        alt="product image">
                                    <div class="card-body">
                                        <h5>{{ $tcategory->name }}</h5>
                                        <p class="card-text">{{ $tcategory->description }}</p>
                                    </div>
                                </div>
                            </a>
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
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 3000,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
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

        $('.trending-carousel').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            dots: false,
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
