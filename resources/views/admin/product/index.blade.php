@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <a href="{{ url('add-product') }}" class="btn btn-warning float-end">Add Product</a>
            <h5>Product Page</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->subcategory->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/products/' . $item->image) }}" class="cate-img"
                                    alt="">
                            </td>
                            <td>
                                <a href="{{ url('edit-product/' . $item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-product/' . $item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
