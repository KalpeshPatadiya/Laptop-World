@extends('layouts.front')

@section('title')
    Collection
@endsection

@section('content')
    <div class="py-2 shadow-lg bg-info">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('collection') }}">
                    Collection
                </a>
            </h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Collections</h2>
                    <div class="row">
                        @foreach ($category as $cate)
                            <div class="col-md-3 mb-3">
                                <a href="{{ url('collection/' . $cate->slug) }}">
                                    <div class="card property-card glass-card card-effect">
                                        <div class="property-image">
                                            <img class="category-img"
                                                src="{{ asset('assets/uploads/category/' . $cate->image) }}"
                                                alt="category image">
                                        </div>
                                        <div class="card-body property-description">
                                            <h4 class="h4">{{ $cate->name }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
