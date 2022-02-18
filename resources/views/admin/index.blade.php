@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body card-gradiant p-3">
                            <p class="mb-0 fw-bold fs-4">Total Orders : {{ $totalOrders }}
                                <i class="dash-icon bi bi-cart-check-fill text-success"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body card-gradiant p-3">
                            <p class="mb-0 fw-bold fs-4">Total Users : {{ $totalUsers }}
                                <i class="dash-icon bi bi-person-check-fill text-primary"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body card-gradiant p-3">
                            <p class="mb-0 fw-bold fs-4">Total Brands : {{ $totalSubcategories }}
                                <i class="dash-icon bi bi-ui-checks-grid text-warning"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body card-gradiant p-3">
                            <p class="mb-0 fw-bold fs-4">Total Products : {{ $totalProducts }}
                                <i class="dash-icon bi-file-earmark-check-fill text-danger"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($products->count() > 0)
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <thead class="table-secondary">
                                <h4>Newest Orders</h4>
                            </thead>
                            <tbody>
                                <tr class="table-success">
                                    <th>Order Id</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                </tr>
                                @foreach ($neworders as $item)
                                    <tr>
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($products->count() > 0)
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <thead class="secondary">
                                <h4>Product Running out of Quantity</h4>
                            </thead>
                            <tbody>
                                <tr class="table-danger">
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                </tr>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
