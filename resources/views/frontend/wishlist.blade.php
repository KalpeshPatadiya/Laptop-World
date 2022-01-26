@extends('layouts.front')

@section('title')
    My Wishlist
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('wishlist') }}">
                    Wishlist
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-4">
        <div class="col-md-12">
            <h3><strong>My Wishlist</strong></h3>
        </div>
        <div class="card shadhow">
            <div class="card-body">
            @if($wishlist->count() > 0)
            
            @else 
                <h4>Wishlist is empty</h4>
            @endif
            </div>
        </div>
    </div>
@endsection
