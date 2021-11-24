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

    <!-- Title -->
    <title> Login </title>
    <!--- Favicon --->
    <link rel="icon" href="<?php echo asset('assets/img/brand/favicon.png'); ?>"
        type="image/x-icon" />
    <!--- Icons css --->
    <link href="<?php echo asset('assets/css/icons.css'); ?>" rel="stylesheet">
    <!--- Right-sidemenu css --->
    <link href="<?php echo asset('assets/plugins/sidebar/sidebar.css'); ?>"
        rel="stylesheet">
    <!--- Custom Scroll bar --->
    <link
        href="<?php echo asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css'); ?>"
        rel="stylesheet" />
    <!--- Style css --->
    <link href="<?php echo asset('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('assets/css/skin-modes.css'); ?>" rel="stylesheet">
    <!--- Sidemenu css --->
    <link href="<?php echo asset('assets/css/sidemenu.css'); ?>" rel="stylesheet">
    <!--- Animations css --->
    <link href="<?php echo asset('assets/css/animate.css'); ?>" rel="stylesheet">

</head>

<body class="main-body bg-light">

    <!-- Loader -->
    <div id="global-loader">
        <img src="<?php echo asset('assets/img/loaders/loader-4.svg'); ?>"
            class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- main-signin-wrapper -->
    <div class="my-auto page page-h">
        <div class="main-signin-wrapper">
            <div class="main-card-signin d-md-flex wd-100p">
                <div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white">
                    <div class="my-auto authentication-pages" style="padding-top: 80px">
                        <!--<div>-->
                        <img src="<?php echo asset('assets/img/logo.png'); ?>"
                            class=" m-0 mb-4" alt="logo">

                        <!--</div>-->
                    </div>
                </div>
                <div class="p-5 wd-md-50p">
                    <div class="main-signin-header">
                        <h2>Welcome back!</h2>
                        <h4>Please sign in to continue</h4>
                        <div id="ErrorMsg">
                        </div>


                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Username</label><input name="username" required
                                    class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Enter your username" type="text">
                            </div>
                            @if (Session::has('error'))
                                <div style="margin-top: -15px;margin-bottom: 13px;">
                                    <span class="" style="font-size: 11px; color: red;" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Password</label> <input name="password" required
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password" type="password" autocomplete="current-password">

                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit" name="submit" class="btn btn-main-primary btn-block">Sign In</button>
                        </form>
                    </div>
                    <div class="main-signin-footer mt-3 mg-t-5">
                        <p><a href="">Forgot password?</a></p>
                        <p>Don't have an account?<br />Create <a
                                href="<?php echo url('/'); ?>"> Artist Account</a> / <a
                                href="<?php echo url('/'); ?>">Label Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main-signin-wrapper -->

    <!--- JQuery min js --->
    <script src="<?php echo asset('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <!--- Bootstrap Bundle js --->
    <script
        src="<?php echo asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>">
    </script>
    <!--- Ionicons js --->
    <script src="<?php echo asset('assets/plugins/ionicons/ionicons.js'); ?>"></script>
    <!--- JQuery sparkline js --->
    <script
        src="<?php echo asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js'); ?>">
    </script>
    <!--- Moment js --->
    <script src="<?php echo asset('assets/plugins/moment/moment.js'); ?>"></script>
    <!--- Eva-icons js --->
    <script src="<?php echo asset('assets/js/eva-icons.min.js'); ?>"></script>
    <!--- Rating js --->
    <script src="<?php echo asset('assets/plugins/rating/jquery.rating-stars.js'); ?>">
    </script>
    <script src="<?php echo asset('assets/plugins/rating/jquery.barrating.js'); ?>">
    </script>
    <!--- Custom js --->
    <script src="<?php echo asset('assets/js/custom.js'); ?>"></script>

</body>

</html>
