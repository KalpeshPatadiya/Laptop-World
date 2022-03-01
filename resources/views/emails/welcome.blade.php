@component('mail::message')
# Welcome to the {{ config('app.name') }}

Thanks for signing up, {{ $user }}!<br>
visit the site and explore the features and products.

@component('mail::button', ['url' => 'http://localhost:8000/'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
