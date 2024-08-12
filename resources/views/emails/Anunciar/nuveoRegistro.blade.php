@component('mail::message')
# Nuevo Registro para publicar

Hola felicitaciones {{ $user->name.' '.$user->last_name}} te has registrado en la plataforma paa inciar la prueba mediante la publicacion de tus propiedades <br>

tu correo de acceso : {{ $user->email }} <br>

@component('mail::button', ['url' => env('APP_URL')])
{{ config('app.name') }}
@endcomponent

<p>Thank you.</p>
{{ config('app.name') }}
@endcomponent
