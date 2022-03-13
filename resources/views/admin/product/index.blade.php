@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <a href="{{ url('add-product') }}" class="btn btn-warning float-end">Add Product</a>
                        <h4>Products</h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable_product" class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Brand</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->subcategory->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>Rs. {{ number_format($item->price) }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/products/' . $item->image) }}"
                                                class="cate-img" alt="">
                                        </td>
                                        <td>@if ($item->status == 1)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        <td>
                                            <a href="{{ url('edit-product/' . $item->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ url('delete-product/' . $item->id) }}"
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable_product').DataTable();
        });
    </script>
@endsection
