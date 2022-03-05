@component('mail::message')
# Your order {{ $order_data['tracking_no'] }} has been shipped by {{ config('app.name') }}

Thank you for shopping with us. We confirm that you order has been shipped.<br>
Here you can download your invoice from below button.

@component('mail::button', ['url' => 'http://localhost:8000/my-orders/'])
Download Invoice
@endcomponent

If you have any query, please contact us at laptopworld640@gmail.com.

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
