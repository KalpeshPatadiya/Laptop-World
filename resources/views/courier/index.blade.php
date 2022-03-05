@extends('layouts.courier')

@section('title')
    Courier Dashboard
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped"
                            type="button" role="tab" aria-controls="shipped" aria-selected="true">Shipped</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="shipped" role="tabpanel" aria-labelledby="shipped-tab">
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
                                            <td>Rs. {{ number_format($item->total_price) }}</td>
                                            @if ($item->order_status == '2')
                                                <td>Shipped</td>
                                            @endif
                                            <td>
                                                <a href="{{ url('courier/view-order/' . $item->id) }}"
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
            $('#datatable_shipped').DataTable();
        });
    </script>
@endsection
