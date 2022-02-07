@extends('layouts.front')

@section('title')
    {{ $subcategory->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-info border-top">
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

    <div class="py-5">
        <div class="container">
            <h2>{{ $subcategory->name }}</h2>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="row">
                        @foreach ($products as $prod)
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="row m-3">
                                        <div class="col-md-3">
                                            <img class="card-img-top"
                                                src="{{ asset('assets/uploads/products/' . $prod->image) }}"
                                                alt="product image">
                                        </div>
                                        <div class="col-md-7 border-right-1 border-left">
                                            <a
                                                href="{{ url('collection/' . $prod->subcategory->category->slug . '/' . $prod->subcategory->slug . '/' . $prod->slug) }}">
                                                <div class="mb-2">
                                                    <h4>{{ $prod->name }}</h4>
                                                </div>
                                                <div class="">
                                                    <h5 class="text-dark mb-0">{!! $prod->highlights !!}</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="float-end">
                                                @if ($prod->trending == '1')
                                                    <label style="font-size: 14px;"
                                                        class="float-end badge bg-danger trending_tag m-3">Trending</label>
                                                @endif
                                                <br>
                                                <h5 class="font-italic"><s>₹ {{ number_format($prod->MRP) }}</s></h5>
                                                <h5 class="font-italic fs-4 fw-bold">₹ {{ number_format($prod->price) }}
                                                </h5>
                                            </div>
                                            <div class="float-end">
                                                <a href="{{ url('collection/' . $prod->subcategory->category->slug . '/' . $prod->subcategory->slug . '/' . $prod->slug) }}"
                                                    class="btn btn-lg btn-outline-success py-1 px-3 mt-5">View Details</a>
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
