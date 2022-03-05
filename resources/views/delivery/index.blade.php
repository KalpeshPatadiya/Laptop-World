@extends('layouts.delivery')

@section('title')
    Delivery Dashboard
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending"
                            type="button" role="tab" aria-controls="pending" aria-selected="true">Out for Delivery</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped"
                            type="button" role="tab" aria-controls="shipped" aria-selected="false">Not Delivered</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <div class="table-responsive mt-4">
                            <table id="datatable_out_delivery" data-order='[[ 0, "desc" ]]' class="table table-striped">
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
                                    @foreach ($out_delivery as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>Rs. {{ number_format($item->total_price) }}</td>
                                            @if ($item->order_status == '3')
                                                <td>Out for Delivery</td>
                                            @endif
                                            <td>
                                                <a href="{{ url('delivery/view-order/' . $item->id) }}"
                                                    class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="shipped" role="tabpanel" aria-labelledby="shipped-tab">
                        <div class="table-responsive mt-4">
                            <table id="datatable_not_delivered" data-order='[[ 0, "desc" ]]' class="table table-striped">
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
                                    @foreach ($not_delivery as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>Rs. {{ number_format($item->total_price) }}</td>
                                            @if ($item->order_status == '5')
                                                <td class="text-danger">Not Delivered</td>
                                            @endif
                                            <td>
                                                <a href="{{ url('delivery/view-order/' . $item->id) }}"
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
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable_out_delivery').DataTable();
            $('#datatable_not_delivered').DataTable();
        });
    </script>
@endsection
