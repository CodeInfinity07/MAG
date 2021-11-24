@component('mail::message')
# Welcome To the MaDigital

MaDigital is the easiest way to sell your Music.<br>
This Mail is just a verification Email, And your verification Code is

@component('mail::button', ['url' => ''])
        {{ $code }}
@endcomponent

If you are not expecting this Email. You are free to ignore.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
