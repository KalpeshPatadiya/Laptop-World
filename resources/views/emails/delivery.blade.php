@component('mail::message')
# Your order {{ $order_data['tracking_no'] }} has been delivered by {{ config('app.name') }}

Thank you for shopping with us.<br>
Please kindly write a review and give rating based on your experience.

We hope to see you again soon...
@component('mail::button', ['url' => 'http://localhost:8000/'])
Visit {{ config('app.name') }}
@endcomponent

If you have any query, please contact us at laptopworld640@gmail.com.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
