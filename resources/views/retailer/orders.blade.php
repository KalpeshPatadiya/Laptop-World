@extends('layouts.retailer')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending"
                            type="button" role="tab" aria-controls="pending" aria-selected="true">Confirmed</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped"
                            type="button" role="tab" aria-controls="shipped" aria-selected="false">Packed</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <div class="table-responsive mt-4">
                            <table id="datatable_pending" data-order='[[ 0, "desc" ]]' class="table table-striped">
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
                                    @foreach ($pending as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>₹ {{ number_format($item->total_price) }}</td>
                                            @if ($item->order_status == '0')
                                                <td>Confirmed</td>
                                            @endif
                                            <td>
                                                <a href="{{ url('retailer/view-order/' . $item->id) }}"
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
                            <table id="datatable_shipped" data-order='[[ 0, "desc" ]]' class="table table-striped">
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
                                    @foreach ($shipped as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>₹ {{ number_format($item->total_price) }}</td>
                                            @if ($item->order_status == '1')
                                                <td>Packed</td>
                                            @endif
                                            <td>
                                                <a href="{{ url('retailer/view-order/' . $item->id) }}"
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
            $('#datatable_pending').DataTable();
            $('#datatable_shipped').DataTable();
        });
    </script>
@endsection
