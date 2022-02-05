@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h5>Sub Category Page</h5>
            </div>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category ID</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($subcategory as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->cat_id }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/sub-category/' . $item->image) }}" class="cate-img"
                                    alt="">
                            </td>
                            <td>
                                <a href="{{ url('edit-sub-category/' . $item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-sub-category/' . $item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        </div>
    </div>
@endsection
