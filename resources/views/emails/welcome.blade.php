@component('mail::message')
# Welcome to our {{ config('app.name') }}

We are Thank You to register in our website.<br>
We Think you will enjoy our website.

@component('mail::button', ['url' => 'http://localhost:8000/'])
Visit our Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
