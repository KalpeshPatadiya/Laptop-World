@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/  ' . $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $category->name }}" name="name" class="form-control">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $category->slug }}" name="slug" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3"
                            class="form-control"> {{ $category->description }} </textarea>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input class="form-check-input form-control" {{ $category->status == '1' ? 'checked' : '' }}
                            type="checkbox" name="status">
                        <label class="form-check-label" for="">Status</label>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input class="form-check-input form-control" {{ $category->popular == '1' ? 'checked' : '' }}
                            type="checkbox" name="popular">
                        <label class="form-check-label" for="">Popular</label>
                    </div>
                    @if ($category->image)
                        <img src="{{ asset('assets/uploads/category/' . $category->image) }}" alt="">
                    @endif
                    <div class="form-group col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
