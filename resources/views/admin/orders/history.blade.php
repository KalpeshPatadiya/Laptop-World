@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md 12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h3>Order History
                            <a href="{{ 'orders' }}" class="btn btn-warning float-end">New Orders</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="datatable_order_history" class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Order ID</th>
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
                                        <td>{{ $item->id }}</td>
                                        <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>₹ {{ number_format($item->total_price) }}</td>
                                        <td>{{ $item->order_status == '3' ? 'Cancelled' : 'Completed' }}
                                        <td>
                                            <a href="{{ url('admin/view-order/' . $item->id) }}"
                                                class="btn btn-primary">View</a>
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
            $('#datatable_order_history').DataTable();
        });
    </script>
@endsection
