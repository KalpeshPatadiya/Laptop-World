@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <a href="{{ url('sub-category') }}" class="btn btn-warning float-end">Back</a>
            <h4>Edit/Update Sub Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-sub-category/  ' . $subcategory->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $subcategory->name }}" name="name" class="form-control">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $subcategory->slug }}" name="slug" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3"
                            class="form-control"> {{ $subcategory->description }} </textarea>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input class="form-check-input form-control" {{ $subcategory->status == '1' ? 'checked' : '' }}
                            type="checkbox" name="status">
                        <label class="form-check-label" for="">Status</label>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input class="form-check-input form-control" {{ $subcategory->popular == '1' ? 'checked' : '' }}
                            type="checkbox" name="popular">
                        <label class="form-check-label" for="">Popular</label>
                    </div>
                    @if ($subcategory->image)
                        <img src="{{ asset('assets/uploads/sub-category/' . $subcategory->image) }}" alt="">
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
