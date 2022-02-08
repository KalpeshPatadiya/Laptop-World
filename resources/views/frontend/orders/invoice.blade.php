<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }

        .brand-section {
            background-color: #0d1033;
            padding: 10px 40px;
        }

        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .text-white {
            color: #fff;
        }

        .company-details {
            float: right;
            text-align: right;
        }

        .body-section {
            padding: 16px;
            border: 1px solid gray;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }

        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table td {
            vertical-align: middle !important;
            text-align: center;
        }

        table th,
        table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

        .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .text-right {
            text-align: end;
        }

        .w-20 {
            width: 20%;
        }

        .float-right {
            float: right;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Laptop World</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <!-- <p class="text-white">Laptop World</p>
                        <p class="text-white">+91 888555XXXX</p> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <h2 class="heading">Invoice No. : {{$orders->id}}</h2>
                        <p class="sub-heading">Tracking No. : {{$orders->tracking_no}} </p>
                        <p class="sub-heading">Order Date : {{$orders->created_at->format('d-m-Y')}} </p>
                        <p class="sub-heading">Email Address : {{$orders->email}} </p>
                    </div>
                    <div class="col-md-6">
                        <p class="sub-heading">Full Name : {{ $orders->fname }} {{ $orders->lname }}</p>
                        <p class="sub-heading">Address : {{ $orders->address1 }} {{ $orders->address2 }}</p>
                        <p class="sub-heading">Phone Number : {{ $orders->phone }}</p>
                        <p class="sub-heading">City, State, Pincode :
                            {{$orders->city}},
                            {{$orders->state}},
                            {{$orders->pincode}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders->orderitems as $item)
                    <tr>
                        <td>{{ $item->products->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $orders->total_price }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td>{{ $orders->total_price }}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status : {{ $orders->status == '0' ? 'Pending...' : 'Completed' }}
            <h3 class="heading">Payment Mode : COD </h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Laptop World . All rights reserved.
                <a href="/" class="float-right">Laptop World</a>
            </p>
        </div>
    </div>

</body>

</html>