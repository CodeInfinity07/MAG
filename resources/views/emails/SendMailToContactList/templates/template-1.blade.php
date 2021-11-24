<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>

    </center>
    <center><img src="{{ $message->embed(asset('assets/img/' . $logo)) }}" alt="logo.jpg" style="max-width:200px">
    </center><br><br>
    <center><img src="{{ $message->embed(asset('assets/images/layout-main-image.png')) }}" alt="main-page.jpg"
            style="max-width:100%"></center>
    <br>
    <h4>Hi {{ $username }} </h4>
    <br>
    <h2>{{ $subject }}</h2>
    <br>

    <br>
    {!! $new_message !!}
    <br>
    <center>
        <a href="{{ $url }}"><button
                style="background: #00a1e1;border:none;outline:none;border-radius:5px;padding:12px 30px;color:white;margin-top:10px">Learn
                More</button></a>
    </center>
    <br>
    <h4> Thanks,<br>
        {{ config('app.name') }}
    </h4>
</body>

</html>
