@extends('layouts.front')

@section('title')
    Welcome
@endsection

@section('content')
    @include('layouts.include.slider')
    <div class="py-4">
        <div class="container-fluid">
            <div class="row">
                <h2 class="px-5">Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme carousel-shadow">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card card-none card-shadow m-2">
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

    <div class="py-4">
        <div class="container">
            <div class="row">
                <h2>New Arrived</h2>
                <div class="owl-carousel new-products owl-theme">
                    @foreach ($new_products as $item)
                        <div class="item">
                            <div class="card card-shadow m-2">
                                <a
                                    href="{{ url('collection/' . $item->subcategory->category->slug . '/' . $item->subcategory->slug . '/' . $item->slug) }}">
                                    <img class="card-img-top zoom-in"
                                        src="{{ asset('assets/uploads/products/' . $item->image) }}" alt="product image">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <span class="float-start"><b>₹</b> {{ $item->price }}</span>
                                        <span class="float-end"><b>₹ </b><s>{{ $item->MRP }}</s></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="container">
            <div class="row">
                <h2>Popular Brands</h2>
                <div class="owl-carousel popular-brands owl-theme">
                    @foreach ($popular_brand as $item)
                        <div class="item">
                            <a href="{{ url('collection/' . $item->category->slug . '/' . $item->slug) }}">
                                <div class="card card-shadow m-2">
                                    <img class="category-img zoom-in"
                                        src="{{ asset('assets/uploads/sub-category/' . $item->image) }}"
                                        alt="subcategory image">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <p class="card-text">{{ $item->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="container">
            <div class="row">
                <h2>Trending Categories</h2>
                <div class="owl-carousel trending-carousel owl-theme">
                    @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a href="{{ url('collection/' . $tcategory->slug) }}">
                                <div class="card card-shadow m-2">
                                    <img class="category-img zoom-in"
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
            loop: false,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });

        $('.new-products').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
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

        $('.popular-brands').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
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
                    items: 3
                }
            }
        });
    </script>
@endsection
