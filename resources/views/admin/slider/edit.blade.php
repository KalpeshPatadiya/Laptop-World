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
                        <h3 class="m-2">Edit Slider</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update-slider/' . $slider->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-md-6 mb-3">
                                <label for="">Link</label>
                                <input type="text" name="link" value="{{ $slider->link }}" class="form-control">
                            </div>
                            @if ($slider->image)
                                <label class="text-bold">Current Image</label><br>
                                <img class="w-50 mb-3"
                                    src="{{ asset('assets/uploads/slider/' . $slider->image) }}" alt="">
                            @endif
                            <div class="form-group col-md-12 mb-3">
                                <label class="text-bold">Select Diffrent Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input class="form-check-input" {{ $slider->status == '1' ? 'checked' : '' }}
                                    type="checkbox" name="status" class="form-control">
                                <label class="form-check-label" for="">Status</label>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Edit Slider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
