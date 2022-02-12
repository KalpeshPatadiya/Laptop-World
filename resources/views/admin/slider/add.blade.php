@extends('layouts.admin')

@section('title')
    Add Slider
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('slider') }}" class="btn btn-warning m-1 float-end">Back</a>
                        <h3 class="m-2">Add Slider</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('insert-slider') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-6 mb-3">
                                <label for="name">Heading</label>
                                <input type="text" name="heading" class="form-control">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="">Link</label>
                                <input type="text" name="link" class="form-control">
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="">Link Name</label>
                                <input type="text" name="link_name" class="form-control">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input class="form-check-input" type="checkbox" name="status" class="form-control">
                                <label class="form-check-label" for="">Status</label>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Add Slider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
