@component('mail::message')
# Your request for cancellation of order {{ $orders->tracking_no }} has been approved.

Cancellation reason you stated : {{ $orders->cancellation_reason }}

@component('mail::table')
| Name | Price | Quantity |
|:----:|:-----:|:--------:|
@foreach($orderitems as $item)
| {{ $item->products->name }} | {{ $item->price }} | {{ $item->qty }} |
@endforeach
@endcomponent

We hope to see you again soon...
@component('mail::button', ['url' => 'http://localhost:8000/'])
Visit {{ config('app.name') }}
@endcomponent

If you have any query, please contact us at laptopworld640@gmail.com.

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
