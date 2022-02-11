<html>

<head>
    <style>
        .container {
            padding: 10px;
        }

        #contact {
            border-collapse: collapse;
            width: 100%;
        }

        #contact td,
        #contact th {
            border: 1px solid #ddd;
            padding: 8px;
            width: 30%;
        }

        #contact th {
            width: 10%;
        }

        #contact tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #contact tr:hover {
            background-color: rgb(128, 128, 128);
        }

        #contact th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #757575;
            color: white;
        }

        .heading {
            background-color: lightgray;
            padding: 10px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="heading">
            <h2>Laptop World - Order Purchasing</h2>
        </div>
        <h3>Tracking No.: {{ $order_data['tracking_no'] }}</h3>
        <h4>Name: {{ $order_data['fname'] }} {{ $order_data['lname'] }} </h4>
        <h4>E-mail: {{ $order_data['email'] }}</h4>
        <h4>Contact no.: {{ $order_data['phone'] }}</h4>
        <h4>Address: {{ $order_data['address1'] }}, {{ $order_data['address2'] }} </h4>
        <h4>City: {{ $order_data['city'] }}</h4>
        <h4>State: {{ $order_data['state'] }}</h4>
        <h4>Country: {{ $order_data['country'] }}</h4>
        <h4>PinCode: {{ $order_data['pincode'] }}</h4>

        @php
            $total = 0;
        @endphp
        <table id="contact" cellpadding="5px" cellspacing="5px" border="1">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartitems as $item)
                    <tr>
                        <td>{{ $item->products->name }}</td>
                        <td>{{ $item->prod_qty }}</td>
                        <td>{{ $item->products->price }}</td>
                    </tr>
                    @php
                        $total += $item->products->price * $item->prod_qty;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="2">Total: </td>
                    <td>{{ $total }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
