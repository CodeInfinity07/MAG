<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>E-Bazar Seller</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href={{asset("assets/images/favicon.png")}}>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href={{asset("assets/node_modules/morrisjs/morris.css")}} rel="stylesheet">
    <!--c3 plugins CSS -->
    <link href={{asset("assets/node_modules/c3-master/c3.min.css")}} rel="stylesheet">
    <!-- Custom CSS -->
    <link href={{asset("assets/dist/css/style.css")}} rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href={{asset("assets/dist/css/pages/dashboard1.css") }}rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    
    @yield('css')


    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">E-Bazar Seller Dashboard</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('Seller.layout.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('Seller.layout.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2020 Elegent Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
   
     
   
    <!-- ============================================================== -->
    <script src={{asset("assets/node_modules/jquery/jquery-3.2.1.min.js")}}></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src={{asset("assets/node_modules/popper/popper.min.js")}}></script>
    <script src={{asset("assets/node_modules/bootstrap/dist/js/bootstrap.min.js")}}></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src={{asset("assets/dist/js/perfect-scrollbar.jquery.min.js")}}></script>
    <!--Wave Effects -->
    <script src={{asset("assets/dist/js/waves.js")}}></script>
    <!--Menu sidebar -->
    <script src={{asset("assets/dist/js/sidebarmenu.js")}}></script>
    <!--Custom JavaScript -->
    <script src={{asset("assets/dist/js/custom.min.js")}}></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src={{asset("assets/node_modules/raphael/raphael-min.js")}}></script>
    <script src={{asset("assets/node_modules/morrisjs/morris.min.js")}}></script>
    <script src={{asset("assets/node_modules/jquery-sparkline/jquery.sparkline.min.js")}}></script>
    <!--c3 JavaScript -->
    <script src={{asset("assets/node_modules/d3/d3.min.js")}}></script>
    <script src={{asset("assets/node_modules/c3-master/c3.min.js")}}></script>
    <!-- Chart JS -->
    <script src={{asset("assets/dist/js/dashboard1.js")}}></script>
    <script>
        if(Session::has('message'))
          var type = "{{ Session::get('alert-type', 'info') }}";
          switch(type){
              case 'info':
                  toastr.info("{{ Session::get('message') }}");
                  break;
              
              case 'warning':
                  toastr.warning("{{ Session::get('message') }}");
                  break;
      
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
      
              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
      </script>
    

    @yield('script')
    
</body>

</html>