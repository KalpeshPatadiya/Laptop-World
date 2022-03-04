@component('mail::message')
# Cancel Order {{ $orders->tracking_no }}

Cancellation Reason: {{ $orders->cancellation_reason }}

@component('mail::table')
| Name | Price | Quantity |
|:----:|:-----:|:--------:|
@foreach($orderitems as $item)
| {{ $item->products->name }} | {{ $item->price }} | {{ $item->qty }} |
@endforeach
@endcomponent

Explore new products and features clicking below button.
@component('mail::button', ['url' => 'http://localhost:8000/'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
