<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Title -->
    <title>@yield('title')</title>
    <!--- Favicon --->
    <link rel="icon" href="<?php echo asset('assets/img/brand/favicon.png'); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @include('admin.includes.top-links')
    @stack('links')

    <!--Dynamic css link tags-->
    @yield('stylesheet')


    <style>
        body {
            background-color: rgb(238, 241, 244);
        }

        .text-black {
            color: black;
        }

        .redstar {
            color: #b40000;
        }

        .fs-16p {
            font-size: 16px;
        }

        .fw-bolder {
            font-weight: bolder;
        }

        #selectedImg_div span {
            color: white;
            background: blueviolet;
            padding: 0px 7px;
            border-radius: 50%;
            position: absolute;
            left: 84px;
            top: 50px;
            cursor: pointer;
        }

        .app-sidebar {
            top: 46px !important;
        }

        .main-header {
            background-color: white !important;
            background: white !important;
            padding-left: 0px !important;
            color: black;

        }

        .header-megamenu-dropdown {
            padding-top: 17px;
            padding-left: 90px;
        }

        .header-megamenu-dropdown .nav-item .btn-link {
            color: black;
        }

        .has-search .form-control {
            background-color: #8080800a;
            border-radius: 10px;
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

        .main-header-message .nav-link i,
        .main-header-notification .nav-link i,
        .nav-item.full-screen .nav-link i {
            color: black;
            border: 1px solid #80808042;
            padding: 10px;
        }

        .main-header-right button {
            border-radius: 7px;
            margin: 15px;
            padding: 10px 20px;
            border: 1px solid #80808042;
        }

        .header-icons {
            fill: black !important;
        }

        .pulse-danger,
        .pulse {
            top: 12px;
            right: 8px;
        }

        .pulse {}

        /* Right Sidebar Menu Hide */

        /* .right-toggle .nav-link .ion{
            display: none;
        }*/


        /* FUll Screen Icon Hide */
        /* .main-header .nav-item.full-screen.fullscreen-button{
            display: none;
        }*/


        /************************
            Main Content
        *************************/
        .app-sidebar .slide.active .side-menu__item {
            background: linear-gradient(45deg, #f542662e, #3858f929) !important;
            border-radius: 7px;
        }

        .app-sidebar .slide.hover .side-menu__item {
            background: linear-gradient(45deg, #f542662e, #3858f929) !important;
            border-radius: 7px;
        }

        .side-menu .slide.active .side-menu__label,
        .side-menu .slide.active .side-menu__icon {
            color: #5155d4 !important;
        }

        .linear-bg {
            background: linear-gradient(139deg, #3858F9, #D14EFF);
            border-radius: 18px;
        }

        .linear-bg-2 {
            background: linear-gradient(334deg, #3858F9, #D14EFF);
            border-radius: 18px;
        }

        .linear-border {
            border: 1px solid #a251fd;
            border-radius: 18px;
        }

        .delet-icon-bg {
            padding: 7px 12px;
            border-radius: 1.5rem;
            background: #80808021;
            color: grey;
        }

        #form-modal .modal-header {
            border-bottom: 0px;
        }

        #form-modal .form-close-icon {
            padding: 2px 12px;
            border-radius: 1.5rem;
            background: #80808021;
            color: black;
        }

        #form-modal .input-icons i {
            position: absolute;
        }

        #form-modal .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }

        #form-modal .icon {
            padding: 8% 0px 0px 3%;
            min-width: 50px;
            text-align: center;
        }

        #form-modal .phone-icon {
            padding: 4% 0px 0px 3%;
            min-width: 50px;
            text-align: center;
        }

        #form-modal .input-field {

            border-radius: 0.3rem !important;
            width: 100%;
            padding-left: 16%;
            /*padding: 10px;*/
            /*text-align: center;*/
        }

        #form-modal .select-payment {

            border-radius: 0.3rem !important;
            width: 100%;
            /*padding-left: 16%;*/
            /*padding: 10px;*/
            /*text-align: center;*/
        }

        #form-modal form .btn-one {
            border: 1px solid #8080802e;
            border-radius: .5rem
        }

        #form-modal form .btn-two {
            border-radius: .5rem
        }




        .fw-500 {
            font-weight: 500;
        }

        .fix-btn {
            border-radius: 6px;
            background-color: #ff00001a;
            color: red;
            /*padding: 10px 50px;*/
        }

        .released-btn {
            border-radius: 6px;
            background-color: #00800029;
            color: green;
            /*padding: 10px 50px;*/
        }

        .clr-green {
            color: green;
        }

        .br-18p {
            border-radius: 18px;
        }

        .br-12p {
            border-radius: 12px;
        }

        .b-w-1p {
            border: 1px solid #ffffff30;
        }

        .b-bg-w {
            background-color: #ffffff36;
        }

        .borderless td,
        .borderless th {
            border: none;
        }

        .main-content:after {
            height: 64px;
        }

        .main-content .right-body {
            padding-top: 80px;
        }

        .table thead th,
        .table thead td {
            padding: 10px 5px !important;
        }

        .country-table .table th,
        .table td {
            padding: 5px 8px !important;
        }

        .carousel-caption {
            padding: 20px 30px !important;
            top: 0% !important;
            right: 0% !important;
            left: 0% !important;
            z-index: 10;
            text-align: left !important;
        }

        .home-section-one .section-right {
            background: linear-gradient(139deg, #405ae699, #3858f9);
            border-radius: 18px;
        }

        .home-section-two .section-right {
            background-color: white;
            border-radius: 18px;

        }

        .home-section-two .section-right .nav-item {
            border-bottom: 2px solid #5b5b5b17;
        }

        .home-section-two .section-right .nav-pills .nav-link.active {
            border-bottom: 2px solid #596fef !important;
            background-color: white;
            color: black;
        }

        .home-section-two .section-right ul li {
            font-weight: 500;
            /*margin: 5px 10px;*/
            padding: 6px 0px;
        }

        .home-section-two .section-right ul li a {
            color: black;

        }

        .home-section-two .section-right ul li a:active {
            border-bottom: 2px solid #4f6af4;
        }

        .home-section-two .section-right .table thead {
            background-color: #8080800d;
            border-radius: 10px;

        }

        .home-section-two .section-right table th {
            border: none !important;
        }

        .home-section-two .section-right table td {
            border-bottom: 1px solid #5757570f;
        }

        .home-section-two .section-right table td img {
            width: auto;
            padding-right: 10px;
        }

        .home-section-two .section-right .table thead th,
        .table thead td {
            color: black !important;
        }

        .home-section-two .section-right button {
            margin-top: 8px;
            background-color: white;
            color: black;
            border: 1px solid #8080803b;
            border-radius: 6px;
            /*margin-left: 64px;*/

        }


        /* SECTION THREE */
        .home-section-three .section-left {
            background-color: white;
            border-radius: 18px;

        }

        .home-section-three .section-right {
            background-color: white;
            border-radius: 18px;

        }

        .home-section-three .section-right .table thead {
            background-color: #8080800d;
            border-radius: 10px;

        }

        .home-section-three .section-right table th {
            border: none !important;
        }

        .home-section-three .section-right table td {
            border-bottom: 1px solid #5757570f;
        }

        .home-section-three .section-right table td img {
            width: auto;
            /*padding-right:10px;*/
        }

        .home-section-three .section-right .table thead th,
        .table thead td {
            color: black !important;
        }

        /* SECTION FOUR */

        .home-section-four .has-search .form-control {
            background-color: #ffffffd6;
        }

        .form-control-select {
            background: rgba(255, 255, 255, 0.07);
            height: 54px;
            font-size: 16px;
            border: 0.03rem rgb(147, 159, 180) solid;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-check-input {

            display: block;
            width: 20px;
            height: 20px;
            border: 1px solid rgba(11, 56, 182, 0.24);
            content: "";
            background: rgba(11, 56, 182, 0.24);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.85);
            height: 54px;
            font-size: 16px;
            border: 0.03rem rgba(147, 159, 180, 0.34) solid;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-control-label {
            font-weight: 500;
            color: #1e1e1e;
            font-size: 17px;
        }

        select::-ms-expand {
            display: none !important;
        }

        .home-section-four .tab-heading-dropdown {
            border: 1px solid #8080806b;
            background-color: white;
            border-radius: 8px;
        }

        /* .home-section-four .heading-col-one{
            background-color: black;
        }*/

        .home-section-four .nav-pills .nav-link {
            background-color: white;
            border-radius: 8px;
        }

        /* .home-section-four  .nav-pills .item-1 h3{
            top: 65.5%;
            color: white;
            position: absolute;
            left: 20.5%;
        }*/
        .home-section-four .nav-pills .item-1 .nav-link {
            padding: 40px 140px 40px 20px;
        }

        .home-section-four .nav-pills .item-2 .nav-link {
            padding: 40px 170px 40px 20px;
        }

        .home-section-four .nav-pills .item-3 .nav-link {
            padding: 40px 180px 40px 20px;
        }

        .home-section-four .nav-pills .item-4 .nav-link {
            padding: 40px 125px 40px 20px;
        }

        .home-section-four .nav-pills .nav-link.active {
            color: white !important;
            background-color: #3858f9 !important;
        }

        .home-section-four .nav-justified .nav-item {
            text-align: left;
        }

        .home-section-four .track-one span {
            border-radius: 20px;
            background-color: #80808014;
            padding: 5px 28px;
        }

        /*.home-section-four .heading-col-one li a:active{
            padding: 40px 100px;
            border-radius: 8px;
        }*/


        /* ON/OFF SWITCH CSS */

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .tab-body-section {
            background-color: white;
            border-radius: 12px;
        }

        hr {
            margin: 0px 25px 0px 20px !important;
            border-top: 1px solid rgb(111 111 111 / 31%) !important;
        }


        @media (min-width: 1350px) {
            .fix-btn {
                padding: 10px 50px;
            }

            .released-btn {
                padding: 10px 30px;
            }
        }

        @media (max-width: 863px) {
            .main-content:after {
                height: 64px !important;
            }

        }

        @media (max-width: 772px) {

            .home-section-one .section-right .container {
                padding: 0px;
            }

            .home-section-two .section-right {
                margin-top: 10%;
            }

            .home-section-two .section-right .nav-pills {
                font-size: 11px;
            }

            .home-section-two .section-right .nav-link {
                padding: 0.5rem 0.5rem;
            }

            .home-section-two .section-right .dropdown button {
                padding: 9px 10px !important;
            }

            .home-section-three .section-right {
                margin-top: 10%;
            }

            .home-section-four .nav-pills .item-1 .nav-link {
                padding: 40px 140px 40px 20px;
            }

            .home-section-four .nav-pills .item-2 .nav-link {
                padding: 40px 170px 40px 20px;
            }

            .home-section-four .nav-pills .item-3 .nav-link {
                padding: 40px 180px 40px 20px;
            }

            .home-section-four .nav-pills .item-4 .nav-link {
                padding: 40px 111px 40px 20px;
            }

            .home-section-four .nav-pills .nav-item {
                margin: 50px;
            }

            .home-section-four .track-one .image-section {
                padding-left: 0px !important;
            }

            .home-section-four .track-one .text-section-1 {
                padding: 18px 0px 5px 0px !important;
            }

            .home-section-four .track-one .text-section-2 {
                padding-top: 0px !important;
            }


            .home-section-four .track-one .text-section-1 p {
                margin-bottom: 0px !important;
            }

            .home-section-four .track-one .btn-section {
                padding-top: 0px !important;
            }

            .home-section-four .track-one .btn-section {
                margin-bottom: 1px !important;
            }

            .home-section-four .track-one .btn-section button {
                padding: 5px 25px !important;
            }



            /* .home-section-four .nav-pills .item-1{
                margin-top: 50px;
            }
            .home-section-four .nav-pills .item-2{
                margin-top: 50px;
            }

            .home-section-four .nav-pills .item-3{
                margin-top: 80px;
            }

            .home-section-four .nav-pills .item-4{
                margin-top: 80px;
            }*/

            .custom-tabs p {
                font-size: 12px !important;
            }

            #form-modal .phone-icon {
                padding: 8% 0px 0px 3%;
            }

            .home-section-four .row-1 {
                margin: .5rem !important;
            }

            .home-section-three .domination {
                padding: 0px;
            }

            .home-section-two .chart {
                padding: 0px;
            }

            /* .home-section-four .row-2{
                margin: .5rem !important;
            }*/

        }

    </style>
    @yield('stylesheet2')



</head>
@livewireStyles

<body class="main-body app sidebar-mini">

    <!-- Loader -->
    <div id="global-loader">
        <img src="<?php echo asset('assets/img/loaders/loader-4.svg'); ?>" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- sidebar-left -->
    @include('admin/includes/left-new')

    <!-- main content  -->
    @yield('content')
    <!-- main content end -->

    <!--Sidebar-right-->
    @include('admin/includes/right-new')

    <!-- Footer opened -->
    @include('admin/includes/footer')

    <!--- Back-to-top --->
    @include('admin.includes.modals')
    <!--Announcements---->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
    <!--- Datepicker js --->
    @include('admin.includes.scripts')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--         <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.4.0/dist/chart.min.js"></script>

         <script>
             var ctx = document.getElementById('myChart').getContext('2d');
             new Chart(ctx, {
                 data: {
                     datasets: [{
                             fill: 'origin'
                         }, // 0: fill to 'origin'
                         {
                             fill: '-1'
                         }, // 1: fill to dataset 0
                         {
                             fill: 1
                         }, // 2: fill to dataset 1
                         {
                             fill: false
                         }, // 3: no fill
                         {
                             fill: '-2'
                         } // 4: fill to dataset 2
                     ]
                 },
                 options: {
                     plugins: {
                         filler: {
                             propagate: true
                         }
                     }
                 }
             });
         </script> -->

    <!-- Google Chart -->

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Days', 'Sales', 'Expenses'],
                ['Mon', 1000, 400],
                ['Tue', 1170, 460],
                ['Wed', 660, 1120],
                ['Thu', 1030, 540],
                ['Fri', 1230, 940],
                ['Sat', 1130, 740],
                ['Sun', 1080, 340],
            ]);

            var options = {
                title: 'Sales Analytics',
                hAxis: {
                    title: 'Year',
                    titleTextStyle: {
                        color: '#333'
                    }
                },
                vAxis: {
                    minValue: 0
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
    <script>
        $(document).on('click', '.add', function(e) {
            var i = $('.add').attr('data-id');
            i++;

            $('.field').append('    <div class="row mb-3" > <div class="col-md-3"> ' +
                '<input type="text" name="" id="input-rate"' +
                'class="form-control"' +
                'placeholder="Primary"  required=""> ' +
                '</div> ' +
                '<div class="col-md-9"> ' +
                '<input type="text" name="" id="input-rate" class="form-control"placeholder="Alpha"  required=""> ' +
                '</div> </div>'
            );
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $( "#org" ).change(function() {
                var org =  $(this).val();
                $("#pre" ).attr({
                    "min" : org });
            });

            $(".tab-one").show();
            $('.tab-one').addClass('active');
            $(".tab-one-content").show();

            $(".tab-two-content").hide();
            $(".tab-three-content").hide();
            $(".tab-four-content").hide();


            $(".tab-one").click(function() {

                $('.tab-two').removeClass('active');
                $('.tab-three').removeClass('active');
                $('.tab-four').removeClass('active');

                $(this).addClass('active');
                $(".tab-two-heading").css("color", "#FF4E5F");
                $(".tab-three-heading").css("color", "#219653");
                $(".tab-four-heading").css("color", "#6F42C1");


                $(".tab-one-content").show();
                $(".tab-two-content").hide();
                $(".tab-three-content").hide();
                $(".tab-four-content").hide();
            });


            $(".tab-two").click(function() {
                // alert();

                $('.tab-one').removeClass('active');
                $('.tab-three').removeClass('active');
                $('.tab-four').removeClass('active');

                $(this).addClass('active');
                $(".tab-two-heading").css("color", "white");
                $(".tab-three-heading").css("color", "#219653");
                $(".tab-four-heading").css("color", "#6F42C1");


                $(".tab-two-content").show();
                $(".tab-one-content").hide();
                $(".tab-three-content").hide();
                $(".tab-four-content").hide();
            });

            $(".tab-three").click(function() {
                // alert();

                $('.tab-one').removeClass('active');
                $('.tab-two').removeClass('active');
                $('.tab-four').removeClass('active');

                $(this).addClass('active');
                $(".tab-three-heading").css("color", "white");
                $(".tab-two-heading").css("color", "#FF4E5F");
                $(".tab-four-heading").css("color", "#6F42C1");

                $(".tab-three-content").show();
                $(".tab-one-content").hide();
                $(".tab-two-content").hide();
                $(".tab-four-content").hide();
            });

            $(".tab-four").click(function() {
                // alert();

                $('.tab-one').removeClass('active');
                $('.tab-two').removeClass('active');
                $('.tab-three').removeClass('active');

                $(this).addClass('active');
                $(".tab-four-heading").css("color", "white");
                $(".tab-two-heading").css("color", "#FF4E5F");
                $(".tab-three-heading").css("color", "#219653");


                $(".tab-four-content").show();
                $(".tab-one-content").hide();
                $(".tab-two-content").hide();
                $(".tab-three-content").hide();
            });




        });
    </script>
    <script>
        //  edit model show
        function show_edit_model() {
            $(".model_show").show();
        }
        //  edit model hide
        function hide_model() {
            $(".model_show").hide();
        }
        //add artist model show
        function show_artist_model() {
            $(".add_artist_show").show();
        }
        //add artist model hide
        function add_artist_close() {
            $(".add_artist_show").hide();
        }
        //add artist model show
        function show_artist_model(id) {
            $(".add_artist_show" + id).show();
        }
        //add artist model hide
        function add_artist_close(id) {
            $(".add_artist_show" + id).hide();
        }
        // show_Announcements model
        function show_Announcements() {
            $(".show_Announcements_model").show();

        }
        // hide_Announcements model
        function Announcements_close() {
            $(".show_Announcements_model").hide();

        }
        // add validation
        $(document).ready(function() {
            $(".update_btn").click(function(e) {
                var pass = $("#pass").val();
                var Cpass = $("#c_pass").val();
                if (pass == '' && Cpass != '') {
                    e.preventDefault();

                    $(".first_pass_error").html("please fill the password");
                    $(".confirm_pass_error").html('');
                } else if (pass != '' && Cpass == '') {
                    e.preventDefault();

                    $(".first_pass_error").html("");
                    $(".confirm_pass_error").html('please fill the confirm password');

                } else if (pass != '' && Cpass != '') {
                    if (pass == Cpass) {

                    } else {
                        e.preventDefault();

                        $(".first_pass_error").html("Your password is not matched try again !");
                        $(".confirm_pass_error").html('');
                    }

                } else if (pass == '' && Cpass == '') {
                    $(".first_pass_error").html("");
                    $(".confirm_pass_error").html('');
                }

            });

        });
    </script>
    {{-- custom js to show preview image --}}
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#selectedImg_div').show();
                    $('#selectedImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        //selected library img
        $(document).on('change', '.change_image', function() {
            readURL(this);
        });
        $(document).on('click', '#selectedImg_div span', function() {
            $('.change_image').val('');
            $('#selectedImg_div').hide('');
            $('#selectedImg').attr('src', '');
        });

        $('.update_artist').attr('disabled', 'disabled');
    </script>
    @stack('scripts')
    @yield("myScripts")

</body>
@livewireScripts

</html>
