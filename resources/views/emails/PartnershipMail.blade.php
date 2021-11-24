@component('mail::message')
# {{ $details['title'] }}



<div>
@component('mail::panel')

    <b>First Name :</b> {{ $details['fname'] }}
    <br>
    <b>Last Name : </b>{{ $details['lname'] }}
    <br>
    <b>Artist Page: </b>{{ $details['creat_for_u'] }}
    <br>
    <b>Country: </b>{{ $details['country'] }}
    <br>
    <b>Role: </b>{{ $details['role'] }}
    <br>
    @if($details['Spotify']!='' || $details['Youtube']!='' || $details['Other']!='')
    <b>Provide relevant artist profile links :</b>
    @if($details['Spotify']!='')
    <br>
    <b>Spotify: </b>{{$details['Spotify']}}
    @endif
    @if($details['Youtube']!='')
    <br>
    <b>Youtube: </b>{{$details['Youtube']}}
    @endif
    @if($details['Other']!='')
    <br>
    <b>Other: </b>{{$details['Other']}}
    @endif
    @endif
    @if($details['anything_tell']!='')
    <br>
    <b>explain: </b>{{$details['anything_tell']}}
    @endif
    @endcomponent
</div>
Thanks,
{{ config('app.name') }}
@endcomponent