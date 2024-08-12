
@component('mail::message')
# New Contact

<p>Hello, there is a new contact in the system.</p>
<p>The registered contact: {{ $user->name.' '.$user->apellido }} </p>

@component('mail::button', ['url' => env('APP_URL')])
{{ config('app.name') }}
@endcomponent

<p>Thank you.</p>
{{ config('app.name') }}
@endcomponent
