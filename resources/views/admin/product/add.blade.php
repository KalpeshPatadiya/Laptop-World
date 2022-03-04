@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-header">
                            <a href="{{ url('products') }}" class="btn btn-warning float-end ms-3">Back</a>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-end">Add Product</button>
                            </div>
                            <h4>Add Product</h4>
                        </div>
                        <div class="card-body">
                            @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#home"
                                        type="button" role="tab">Product</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile"
                                        type="button" role="tab">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#other"
                                        type="button" role="tab">Product Status</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 form-group my-3">
                                            <select class="form-select catS" id="cat_id" name="cat_id">
                                                <option value="0" disabled="true" selected="true">Select a Category</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <select class="form-select subcatS mt-3" id="subcat_id" name="subcat_id">
                                                <option value="0" disabled="true" selected="true">Select a Brand
                                                </option>
                                            </select>
                                        </div>
                                        {{ csrf_field() }}
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="">Small Description</label>
                                            <textarea name="small_description" id="sumnote_desc" rows="4"
                                                class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label for="">MRP</label>
                                            <input type="number" name="MRP" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label for="">Price</label>
                                            <input type="number" name="price" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-4 mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-12 my-3">
                                            <input type="file" name="image" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel">
                                    <div class="form-group col-md-6 mt-3 mb-3">
                                        <label for="name">Highlights</label>
                                        <input type="text" name="high_heading" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Highlights Description</label>
                                        <textarea name="highlights" id="sumnote_highlight" rows="4"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="">Product Description</label>
                                        <input type="text" name="des_heading" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Product Description</label>
                                        <textarea name="description" id="sumnote_prod_desc" rows="4"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="">Product Details/Specifications</label>
                                        <input type="text" name="det_heading" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Product Details/Specifications</label>
                                        <textarea name="details" id="sumnote_detail" rows="4"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="other" role="tabpanel">
                                    <div class="form-group col-md-12 my-3">
                                        <input class="form-check-input" type="checkbox" name="status" class="form-control"
                                            required>
                                        <label class="form-check-label" for="">Status</label><span
                                            class="mx-5 text-success">if checked
                                            then product will show otherwise hide</span>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <input class="form-check-input" type="checkbox" name="trending"
                                            class="form-control">
                                        <label class="form-check-label" for="">Trending</label>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <input class="form-check-input" type="checkbox" name="new_arrivals"
                                            class="form-control">
                                        <label class="form-check-label" for="">New Arrival</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#sumnote_desc").summernote();
            $("#sumnote_highlight").summernote();
            $("#sumnote_prod_desc").summernote();
            $("#sumnote_detail").summernote();
        });

        $(document).ready(function() {

            $(document).on('change', '.catS', function() {

                var cat_id = $(this).val();
                var div = $(this).parent();
                var op = " ";

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findcatS') !!}',
                    data: {
                        'id': cat_id
                    },
                    success: function(data) {
                        op +=
                            '<option value="0" selected disabled>Select a Sub Category</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].name +
                                '</option>';
                        }
                        div.find('.subcatS').html(" ");
                        div.find('.subcatS').append(op);
                    },
                    error: function() {

                    }
                });
            });
        });
    </script>
@endsection
