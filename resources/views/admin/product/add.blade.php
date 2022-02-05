@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Product</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">Other</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-12 form-group mt-3 mb-3">
                            <select class="form-select" name="subcat_id">
                                <option value="">Select a Sub Category</option>
                                @foreach ($subcategory as $item)
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
                            <textarea name="small_description" rows="3" class="form-control"></textarea>
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
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="form-group col-md-6 mt-3 mb-3">
                        <label for="name">Highlights</label>
                        <input type="text" name="high_heading" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Highlights Description</label>
                        <input type="text" name="highlights" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Product Description</label>
                        <input type="text" name="des_heading" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Product Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Product Details/Specifications</label>
                        <input type="text" name="det_heading" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Product Details/Specifications</label>
                        <textarea name="details" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="form-group col-md-4 mt-3 mb-3">
                        <label for="">New Arrival</label>
                        <input name="new_arrivals" rows="3" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Offers</label>
                        <input name="offers_pr" rows="3" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection