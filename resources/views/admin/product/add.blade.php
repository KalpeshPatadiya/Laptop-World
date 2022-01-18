@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <select class="form-select" name="cat_id">
                            <option value="">Select a Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">MRP</label>
                        <input type="number" name="MRP" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" class="form-control">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input class="form-check-input" type="checkbox" name="status" class="form-control">
                        <label class="form-check-label" for="">Status</label>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input class="form-check-input" type="checkbox" name="trending" class="form-control">
                        <label class="form-check-label" for="">Trending</label>
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
