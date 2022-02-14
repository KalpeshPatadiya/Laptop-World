@extends('layouts.admin')

@section('title')
    Slider
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('add-slider') }}" class="btn btn-warning m-1 float-end">Add Slider</a>
                        <h3 class="m-2">Slider</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Heading</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/slider/' . $item->image) }}"
                                                class="cate-img" alt="">
                                        </td>
                                        <td>{{ $item->status == 1 ? 'Visible' : 'Hidden' }}</td>
                                        <td>
                                            <a href="{{ url('edit-slider/' . $item->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ url('delete-slider/' . $item->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
