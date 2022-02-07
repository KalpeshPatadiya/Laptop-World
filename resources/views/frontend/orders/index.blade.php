@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>My Orders</h3>
                    </div>
                    @if ($orders->count() > 0)
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Tracking Number</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->total_price }}</td>
                                            <td>{{ $item->status == '0' ? 'Pending...' : 'Completed' }}
                                            <td>
                                                <a href="{{ url('view-order/' . $item->id) }}"
                                                    class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="card-body text-center">
                            <h2>You haven't any Ordered yet</h2>
                            <a href="{{ url('/') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
