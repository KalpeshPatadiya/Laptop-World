<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $orders->tracking_no }}</title>
    <style>
        h1 {
            font: bold 125% sans-serif;
            letter-spacing: 0.3em;
            text-align: center;
            text-transform: uppercase;
        }

        table {
            font-size: 88%;
        }

        th,
        td {
            border-width: 1px;
            padding: 0.5em;
            text-align: left;
            border-style: solid;
            border-radius: 0.25em;
        }

        th {
            background: #EEE;
            border-color: #BBB;
        }

        td {
            border-color: #DDD;
        }

        html {
            font: 16px/1 'Open Sans', sans-serif;
            overflow: auto;
            padding: 0.5in;
        }


        body {
            box-sizing: border-box;
            margin: 0 auto;
            width: 7in;
            background: #FFF;
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        }

        header {
            margin: 0 0 3em;
        }

        header:after {
            clear: both;
            content: "";
            display: table;
        }

        header h1 {
            background: #000;
            border-radius: 0.25em;
            color: #FFF;
            margin: 0 0 1em;
            padding: 0.5em 0;
        }

        header address {
            float: left;
            font-size: 100%;
            font-style: normal;
            line-height: 1.25;
        }

        article,
        article address,
        table.meta,
        table.inventory {
            margin: 0 0 3em;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }

        article address {
            float: left;
            font-size: 125%;
            font-weight: bold;
        }

        table.meta,
        table.balance {
            float: right;
            width: 36%;
        }

        table.inventory {
            clear: both;
            width: 100%;
        }

        table.balance th,
        table.balance td {
            width: 50%;
        }

    </style>
</head>

<body>
    <header>
        <h1>Invoice</h1>
        <address>
            <h3>Invoice No. : {{ $orders->id }}</h3>
            <p>Full Name : {{ $orders->fname }} {{ $orders->lname }}</p>
            <p>Email Address : {{ $orders->email }} </p>
            <p>Phone Number : {{ $orders->phone }}</p>
            <p>Address : {{ $orders->address1 }}, {{ $orders->address2 }}, {{ $orders->city }},
                {{ $orders->state }} - {{ $orders->pincode }}</p>
        </address>
    </header>
    <article>
        <address>
            <p>{{ config('app.name') }}</p>
        </address>
        <table class="meta">
            <tr>
                <th>Tracking No.</th>
                <td>{{ $orders->tracking_no }}</td>
            </tr>
            <tr>
                <th>Order Date</th>
                <td>{{ $orders->created_at->format('d-m-Y') }}</td>
            </tr>
        </table>
        <table class="inventory">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders->orderitems as $item)
                    <tr>
                        <td>{{ $item->products->name }}</td>
                        <td>Rs. {{ number_format($item->price) }}</td>
                        <td>{{ $item->qty }}</td>
                        @php
                            $prod_total = $item->price * $item->qty;
                        @endphp
                        <td>Rs. {{ number_format($prod_total) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <address>
            <h5 class="heading">Payment Status : {{ $orders->status == '1' ? 'Shipped' : 'Delivered' }}</h5>
            <h5 class="heading">Payment Mode : Cash on Delivery </h5>
        </address>
        <table class="balance">
            <tr>
                <th>Grand Total</th>
                <td>Rs. {{ number_format($orders->total_price) }}</td>
            </tr>
        </table>
    </article>
    <aside>
        <h1>Additional Notes</h1>
        <div>
            <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
        </div>
    </aside>
</body>

</html>
