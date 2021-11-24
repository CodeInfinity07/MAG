{{-- @if (Session::has('success')) --}}
<html>

<head>
    <title>success</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <style>
        .overlay {
            background: #536976;
            background: -webkit-linear-gradient(to right, #292E49, #536976);
            background: linear-gradient(to right, #292E49, #536976);
            opacity: 0.9;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100vh;
        }

        body {
            padding: 0;
            margin: 0;
        }

    </style>
</head>

<body>

    <div style="height: 100vh; display: flex; background-image: url(bg.jpeg);    background-repeat: no-repeat;
    background-size: cover;
    background-position: center; align-items: center;   justify-content: center;    position: relative;">
        <div class="overlay"></div>

        <div style="width: 52%;position: absolute;text-align:center">
            <div>
                <center>
                    <lottie-player src="{{ url('js/success.json') }}" background="transparent" speed="1"
                        style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                </center>
            </div>
            <div style="    width: 100%;border-radius:7px; background: #58e877;   box-shadow: 1px 2px 4px green;">
                <h1
                    style="   color: white;   font-weight: 900;   padding: 25px;   font-family: 'Raleway', sans-serif;  text-transform: capitalize;  font-size: 34px;    text-align: center;">
                    {{ session('success') }}<br> Thanks . <br></h1>
            </div>
            <a href="{{ url('dashboard') }}" style="color: white;">Please
                Login Here</a>
        </div>
    </div>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>

</html>
{{-- @else
    <script>
        window.location.href = "{{ url('/') }}";

    </script>
@endif --}}
