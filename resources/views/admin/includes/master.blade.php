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
    <link rel="icon" href="<?php echo asset('assets/img/brand/favicon.png'); ?>"
        type="image/x-icon" />
    @include('admin.includes.top-links')
    @stack('links')
    <style>
        .redstar {
            color: #b40000;
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

    </style>
</head>

<body class="main-body app sidebar-mini">

    <!-- Loader -->
    <div id="global-loader">
        <img src="<?php echo asset('assets/img/loaders/loader-4.svg'); ?>"
            class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- sidebar-left -->
    @include('admin/includes/left')

    <!-- main content  -->
    @yield('content')
    <!-- main content end -->

    <!--Sidebar-right-->
    @include('admin/includes/right')

    <!-- Footer opened -->
    @include('admin/includes/footer')

    <!--- Back-to-top --->
    @include('admin.includes.modals')
    <!--Announcements---->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
    <!--- Datepicker js --->
    @include('admin.includes.scripts')
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

</body>

</html>
