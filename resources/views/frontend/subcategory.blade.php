@extends('layouts.front')

@section('title')
    Brands
@endsection

@section('content')
    <div class="py-2 shadow-lg bg-info">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Collection
                </a> /
                <a href="{{ url('collection/' . $category->name) }}">
                    {{ $category->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="pt-5">
        <div class="container">
            <div class="row">
                <h2>Brands</h2>
                @foreach ($subcategory as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card glass-card card-effect">
                            <a href="{{ url('collection/' . $item->category->slug . '/' . $item->slug . '/') }}">
                                <img class="category-img p-4"
                                    src="{{ asset('assets/uploads/sub-category/' . $item->image) }}" alt="product image">
                                <div class="card-body">
                                    <h4 class="text-center">{{ $item->name }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
