@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/  ' . $products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-select">
                            <option value="">{{ $products->category->name }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $products->name }}" name="name" class="form-control">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $products->slug }}" name="slug" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3"
                            class="form-control"> {{ $products->description }} </textarea>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">MRP</label>
                        <input type="number"  value="{{ $products->MRP }}" name="MRP" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Price</label>
                        <input type="number"  value="{{ $products->price }}" name="price" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Quantity</label>
                        <input type="number"  value="{{ $products->quantity }}" name="quantity" class="form-control">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input class="form-check-input form-control" {{ $products->status == '1' ? 'checked' : '' }}
                            type="checkbox" name="status">
                        <label class="form-check-label" for="">Status</label>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input class="form-check-input form-control" {{ $products->trending == '1' ? 'checked' : '' }}
                            type="checkbox" name="trending">
                        <label class="form-check-label" for="">Trending</label>
                    </div>
                    @if ($products->image)
                        <img src="{{ asset('assets/uploads/products/' . $products->image) }}" alt="">
                    @endif
                    <div class="form-group col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
