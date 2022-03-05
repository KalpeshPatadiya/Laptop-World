@component('mail::message')
# Hey,  {{ $order_data['fname'] }}

Your order has been confirmed!<br>
Thank you for shopping!<br>

# Your order details :<br>

Tracking no. : {{ $order_data['tracking_no'] }}<br>
@component('mail::table')
| Product Name | Quantity | Price |
|:------------:|:--------:|:-----:|
@foreach($cartitems as $item)
| {{ $item->products->name }} | {{ $item->prod_qty }} | {{ $item->products->price }} |
@endforeach
@endcomponent
Sub Total : {{ $order_data['total_price'] }}

Your order hasn't been shipped yet, but we'll send you an email when it does.

@component('mail::button', ['url' => 'http://localhost:8000/my-orders'])
View or Manage Order
@endcomponent

If you have any query, please contact us at laptopworld640@gmail.com.

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
