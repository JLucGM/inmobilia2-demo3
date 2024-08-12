@component('mail::message')
# New user

<p>Welcome <strong>{{ $user->name.' '.$user->last_name}}</strong>, to inmobilia2</p>

<p>Email: {{ $user->email }} </p>
<p>Password: {{ $password }}</p>

@component('mail::button', ['url' => env('APP_URL')])
{{ config('app.name') }}
@endcomponent

<p>Thank you.</p>
{{ config('app.name') }}
@endcomponent
