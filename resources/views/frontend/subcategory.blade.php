@extends('layouts.front')

@section('title')
    Sub Category
@endsection

@section('content')
    <div class="py-2 shadow-lg bg-info">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('collection') }}">
                    Collection
                </a> /
                <a href="{{ url('collection/' . $category->name) }}">
                    {{ $category->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Sub Categories</h2>
                @foreach ($subcategory as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card glass-card card-effect">
                            <a href="{{ url('collection/' . $item->category->slug . '/' . $item->slug . '/') }}">
                                <img class="category-img"
                                    src="{{ asset('assets/uploads/sub-category/' . $item->image) }}" alt="product image">
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
