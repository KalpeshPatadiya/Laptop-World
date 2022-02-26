@extends('layouts.front')

@section('title')
    {{ $subcategory->name }}
@endsection

@section('content')
    <div class="py-2 shadow-lg bg-info">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('collection') }}">
                    Collection
                </a> /
                <a href="{{ url('collection/' . $subcategory->category->name) }}">
                    {{ $subcategory->category->name }}
                </a> /
                <a href="{{ url('collection/' . $subcategory->category->name . '/' . $subcategory->name) }}">
                    {{ $subcategory->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="pt-5">
        <div class="container">
            <h2>{{ $subcategory->name }}</h2>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <span class="fw-bold sort-font">Sort By :</span>
                    <a href="{{ URL::current() }}" class="sort-font">All</a>
                    <a href="{{ URL::current() . '?sort=price_asc' }}" class="sort-font">Price: Low to High</a>
                    <a href="{{ URL::current() . '?sort=price_desc' }}" class="sort-font">Price: High to Low</a>
                    <a href="{{ URL::current() . '?sort=newest' }}" class="sort-font">Newest</a>
                    <a href="{{ URL::current() . '?sort=trending' }}" class="sort-font">Trending</a>
                </div>

                <div class="col-md-3">
                    <form action="{{ URL::current() }}" method="get">
                        <div class="card glass p-0">
                            <div class="card-header">
                                <h4>Brands
                                    <button type="submit" class="btn btn-sm btn-primary float-end">Filter</button>
                                </h4>
                            </div>
                            <div class="card-body">
                                @foreach ($subcatlist as $item)
                                    @php
                                        $checked = [];
                                        if (isset($_GET['filterbrand'])) {
                                            $checked = $_GET['filterbrand'];
                                        }
                                    @endphp
                                    <div class="mb-1">
                                        <input type="checkbox" name="filterbrand[]" value="{{ $item->name }}"
                                            @if (in_array($item->name, $checked)) checked @endif>
                                        {{ $item->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-9 mb-3">
                    <div class="row">
                        @foreach ($products as $prod)
                            <div class="col-md-12 mb-2">
                                <div class="card login container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="category-img"
                                                src="{{ asset('assets/uploads/products/' . $prod->image) }}"
                                                alt="product image">
                                        </div>
                                        <div class="col-md-7 border-end border-start">
                                            <a
                                                href="{{ url('collection/' . $prod->subcategory->category->slug . '/' . $prod->subcategory->slug . '/' . $prod->slug) }}">
                                                <div class="m-3">
                                                    <h4>{{ $prod->name }}</h4>
                                                </div>
                                            </a>
                                            <div class="">
                                                <h5 class="text-dark mb-0">{!! $prod->small_description !!}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="float-end">
                                                @if ($prod->trending == '1')
                                                    <label style="font-size: 14px;"
                                                        class="float-end badge bg-danger trending_tag m-3">Trending</label>
                                                @endif
                                                <br>
                                                <h5 class="font-italic"><s>₹ {{ $prod->MRP }}</s></h5>
                                                <h5 class="font-italic fs-4 fw-bold mb-5">₹ {{ $prod->price }}
                                                </h5>
                                            </div>
                                            <div class="float-end">
                                                <a href="{{ url('collection/' . $prod->subcategory->category->slug . '/' . $prod->subcategory->slug . '/' . $prod->slug) }}"
                                                    class="btn btn-outline-dark btn-delete mt-2"
                                                    style="margin: -8px; padding: 10px;">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
