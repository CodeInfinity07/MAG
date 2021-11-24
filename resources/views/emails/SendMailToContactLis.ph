@component('mail::message')
<h1>hello</h1>
# Welcome To the MaDigital

MaDigital is the easiest way to sell your Music.<br>

                 {{ $message }}


If you are not expecting this Email. You are free to ignore.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
