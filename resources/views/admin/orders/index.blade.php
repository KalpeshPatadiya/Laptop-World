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
                        <h3>New Orders
                            <a href="{{ 'order-history' }}" class="btn btn-warning float-end">Order History</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="datatable_order"  data-order='[[ 0, "desc" ]]' class="table table-striped">
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
                                        <td>{{ $item->total_price }}</td>
                                        @if ($item->order_status == '0')
                                            <td>Pending</td>
                                        @elseif($item->order_status == '1')
                                            <td>Shipped</td>
                                        @elseif($item->order_status == '2')
                                            <td>Completed</td>
                                        @else
                                            <td>Cancelled</td>
                                        @endif
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
            $('#datatable_order').DataTable();
        });
    </script>
@endsection
