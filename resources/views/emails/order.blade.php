<html>

<head>

</head>

<body>
    <h3>Laptop World - Order Purchasing</h3>
    <h4>Name: {{ $order_data->fname }} {{ $order_data->lname }} </h4>
    <h4>E-mail: {{ $order_data->email }}</h4>
    <h4>Contact no.: {{ $order_data->phone }}</h4>
    <h4>Address: {{ $order_data->address1 }}, {{ $order_data->address2 }} </h4>
    <h4>City: {{ $order_data->city }}</h4>
    <h4>State: {{ $order_data->state }}</h4>
    <h4>Country: {{ $order_data->country }}</h4>
    <h4>PinCode: {{ $order_data->pincode }}</h4>

    @php
        $total = 0;
    @endphp
    <table cellpadding="5px" cellspacing="5px" border="1">
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
</body>

</html>
