@extends('layouts.front')

@section('title')
    Sub Category
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                    Collection / {{ $category->name }}
            </h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Sub Categories</h2>
                @foreach($subcategory as $item)
                <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('category/' . $item->category->slug . '/' . $item->slug . '/') }}">
                                <img class="card-img-top" src="{{ asset('assets/uploads/sub-category/' . $item->image) }}"
                                    alt="product image">
                                <div class="card-body">
                                    <h5>{{ $item->name }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                </div>
                            </a>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
