@component('mail::message')
# Your order has been shipped by {{ config('app.name') }}

We are Thank You to Buying Product from our website.<br>
Here you can download your invoice from below button.

@component('mail::button', ['url' => 'http://localhost:8000/my-orders/'])
Download Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
