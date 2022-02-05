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
                        <div class="col-md-12 mt-3">
                            <select class="form-select">
                                <option value="">{{ $products->subcategory->name }}</option>
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
                            <textarea name="small_description" rows="3" class="form-control"> {{ $products->small_description }} </textarea>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="">MRP</label>
                            <input type="number" value="{{ $products->MRP }}" name="MRP" class="form-control">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="">Price</label>
                            <input type="number" value="{{ $products->price }}" name="price" class="form-control">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="">Quantity</label>
                            <input type="number" value="{{ $products->quantity }}" name="quantity" class="form-control">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <input class="form-check-input form-control" {{ $products->status == '1' ? 'checked' : '' }} type="checkbox" name="status">
                            <label class="form-check-label" for="">Status</label>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <input class="form-check-input form-control" {{ $products->trending == '1' ? 'checked' : '' }} type="checkbox" name="trending">
                            <label class="form-check-label" for="">Trending</label>
                        </div>
                        @if ($products->image)
                        <img src="{{ asset('assets/uploads/products/' . $products->image) }}" alt="">
                        @endif
                        <div class="form-group col-md-12 mt-1 mb-3">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="form-group col-md-6 mt-3 mb-3">
                        <label for="name">Highlights</label>
                        <input type="text" name="high_heading" value="{{ $products->high_heading }}" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Highlights Description</label>
                        <input type="text" name="highlights" value="{{ $products->highlights }}" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
<<<<<<< HEAD
                        <label for="">MRP</label>
                        <input type="number" value="{{ $products->MRP }}" name="MRP" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Price</label>
                        <input type="number" value="{{ $products->price }}" name="price" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{ $products->quantity }}" name="quantity" class="form-control">
=======
                        <label for="">Product Description</label>
                        <input type="text" name="des_heading" value="{{ $products->des_heading }}" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Product Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $products->description }}</textarea>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Product Details/Specifications</label>
                        <input type="text" name="det_heading" value="{{ $products->det_heading }}" class="form-control">
>>>>>>> 8041c023bdbcb630c9afaf7607eeeef80cff352f
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Product Details/Specifications</label>
                        <textarea name="details" rows="3" class="form-control">{{ $products->details }}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="form-group col-md-4 mt-3 mb-3">
                        <label for="">New Arrival</label>
                        <input name="new_arrivals" rows="3" value="{{ $products->new_arrivals }}" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="">Offers</label>
                        <input name="offers_pr" rows="3" value="{{ $products->offers_pr }}" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection