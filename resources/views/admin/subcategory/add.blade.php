@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <a href="{{ url('sub-category') }}" class="btn btn-warning float-end">Back</a>
                        <h4>Add Brand</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('insert-sub-category') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" class="form-control" required>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" rows="3" class="form-control" required></textarea>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <input class="form-check-input" type="checkbox" name="status" class="form-control"
                                        required>
                                    <label class="form-check-label" for="">Status</label>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <input class="form-check-input" type="checkbox" name="popular" class="form-control">
                                    <label class="form-check-label" for="">Popular</label>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Add Brand</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
