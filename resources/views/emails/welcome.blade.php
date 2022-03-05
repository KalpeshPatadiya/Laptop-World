@component('mail::message')
# Hello {{$user}}!

We are delighted to have you on board<br>

Enjoy yourself, and welcome to Laptop-World

@component('mail::button', ['url' => 'http://localhost:8000/'])
Visit {{ config('app.name') }}
@endcomponent

If there is anything we can help you with, please contact us at laptopworld640@gmail.com.

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
