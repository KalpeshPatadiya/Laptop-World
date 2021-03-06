@extends('layouts.front')

@section('title')
    Welcome
@endsection

@section('content')
    @include('layouts.include.slider')

    <div class="py-4">
        <div class="container-fluid glass">
            <div class="row">
                <h2 class="px-4">Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card card-effect card-none card-shadow m-2 glass-card">
                                <a
                                    href="{{ url('collection/' . $prod->subcategory->category->slug . '/' . $prod->subcategory->slug . '/' . $prod->slug) }}">
                                    <img class="card-img-top zoom-in"
                                        src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="product image">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start"><b>₹ {{ number_format($prod->price) }}</b></span>
                                        <span class="ms-4"><s><b>₹
                                                </b>{{ number_format($prod->MRP) }}</s></span>
                                        @php
                                            $discount = (($prod->MRP - $prod->price) / $prod->MRP) * 100;
                                        @endphp
                                        <span class="float-end text-success">{{ number_format($discount) }}% off</span>
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
        <div class="container glass">
            <div class="row">
                <h2 class="px-4">New Arrived</h2>
                <div class="owl-carousel new-products owl-theme">
                    @foreach ($new_products as $item)
                        <div class="item">
                            <div class="card card-effect card-shadow m-2 glass-card">
                                <a
                                    href="{{ url('collection/' . $item->subcategory->category->slug . '/' . $item->subcategory->slug . '/' . $item->slug) }}">
                                    <img class="card-img-top zoom-in"
                                        src="{{ asset('assets/uploads/products/' . $item->image) }}" alt="product image">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <span class="float-start"><b>₹ {{ number_format($item->price) }}</b></span>
                                        <span class="ms-4"><s><b>₹
                                                </b>{{ number_format($item->MRP) }}</s></span>
                                        @php
                                            $discount = (($item->MRP - $item->price) / $item->MRP) * 100;
                                        @endphp
                                        <span class="float-end text-success">{{ number_format($discount) }}% off</span>
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
        <div class="container glass">
            <div class="row">
                <h2 class="px-4">Popular Brands</h2>
                <div class="owl-carousel popular-brands owl-theme">
                    @foreach ($popular_brand as $item)
                        <div class="item">
                            <a href="{{ url('collection/' . $item->category->slug . '/' . $item->slug) }}">
                                <div class="card card-effect card-shadow m-2 glass-card">
                                    <img class="category-img p-4"
                                        src="{{ asset('assets/uploads/sub-category/' . $item->image) }}"
                                        alt="subcategory image">
                                    <div class="card-body">
                                        <h5 class="text-center">{{ $item->name }}</h5>
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
            loop: true,
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
            loop: true,
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
    </script>
@endsection
