<!DOCTYPE html>
<html lang="en">

<head>

    <title>MaDigital</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="team" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}css/tooplate-style.css">
    <link href='{{ asset('css/select2.min.css') }}' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500&display=swap" rel="stylesheet">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('/') }}css/custom.css">
</head>

<body>


    @yield('content')


    <!-- SCRIPTS -->
    <script src="{{ asset('/') }}js/jquery.js"></script>
    <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/jquery.stellar.min.js"></script>
    <script src="{{ asset('/') }}js/owl.carousel.min.js"></script>
    <script src="{{ asset('/') }}js/smoothscroll.js"></script>
    <script src="{{ asset('/') }}js/custom.js"></script>
    <script src='{{ asset('js/select2.min.js') }}' type='text/javascript'></script>
    <script>
        $(document).ready(function() {
            $("#country_artist").select2();
            // Initialize select2
            $("#country_label").select2();
            $("#country_beatmake").select2();
            $("#country_partner").select2();

            // code to show next step after selecting artist number start
            $(".next-btn").click(function(e) {
                e.preventDefault();
                $('.artist_beatmake').fadeOut(1000);
                $('#select_artist').fadeOut(1000).promise().done(function() {
                    $('.select_artist_col').addClass('col-md-offset-3');

                    $('#show_register').fadeIn(1000);
                    var range = $('.how-much-artist-range').val();
                    $('.how-much-artist').val(range);
                });
            });
            // for back step 
            $('.back-btn').click(function() {
                $('#show_register').fadeOut(1000).promise().done(function() {
                    $('.select_artist_col').removeClass('col-md-offset-3');
                    $('.artist_beatmake').fadeIn(1000);
                    $('#select_artist').fadeIn(1000);

                });
            });
            // code to show next step after selecting artist number end
        });

    </script>



</body>

</html>
