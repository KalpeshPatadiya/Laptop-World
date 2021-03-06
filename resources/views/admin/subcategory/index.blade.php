@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <a href="{{ url('add-sub-category') }}" class="btn btn-warning float-end">Add Brand</a>
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategory as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/sub-category/' . $item->image) }}"
                                                class="cate-img" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ url('edit-sub-category/' . $item->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ url('delete-sub-category/' . $item->id) }}"
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
