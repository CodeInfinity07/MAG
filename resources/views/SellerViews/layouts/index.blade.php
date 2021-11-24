<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>EBazar - Shopping</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/SellerPublic')}}/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/SellerPublic')}}/plugins/highlightjs/styles/darkula.css">
    <link href="{{asset('assets/SellerPublic')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('assets/SellerPublic')}}/plugins/toastr/css/toastr.min.css" rel="stylesheet">
    @yield('style')
</head>

<body>


    @include('SellerViews.layouts.header')
    @include('SellerViews.layouts.sidebar')

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        @yield('links')
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
      

    <!--**********************************
        Scripts
    ***********************************-->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script src="{{asset('assets/SellerPublic')}}/plugins/common/common.min.js"></script>
    <script src="{{asset('assets/SellerPublic')}}/js/custom.min.js"></script>
    <script src="{{asset('assets/SellerPublic')}}/js/settings.js"></script>
    <script src="{{asset('assets/SellerPublic')}}/js/gleek.js"></script>
    <script src="{{asset('assets/SellerPublic')}}/js/styleSwitcher.js"></script>
    <script src="{{asset('assets/SellerPublic')}}/js/main.js"></script>
    <script src="{{asset('assets/SellerPublic')}}/plugins/highlightjs/highlight.pack.min.js"></script>
    
    <script>hljs.initHighlightingOnLoad();</script>
    {{-- tosatr --}}
    <script src="{{asset('assets/SellerPublic')}}/plugins/toastr/js/toastr.min.js"></script>
    <script src="{{asset('assets/SellerPublic')}}/plugins/toastr/js/toastr.init.js"></script>

    <script src="{{asset('assets/SellerPublic')}}/plugins/validation/jquery.validate.min.js"></script>
    <script src="{{asset('assets/SellerPublic')}}/plugins/validation/jquery.validate-init.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
                             <script> CKEDITOR.replace( 'description_product' );
                             </script>

                             @yield('scripts')
    <script>
        (function($) {
        "use strict"

            new quixSettings({
                version: "light", //2 options "light" and "dark"
                layout: "vertical", //2 options, "vertical" and "horizontal"
                navheaderBg: "color_1", //have 10 options, "color_1" to "color_10"
                headerBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarStyle: "full", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
                sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarPosition: "fixed", //have two options, "static" and "fixed"
                headerPosition: "fixed", //have two options, "static" and "fixed"
                containerLayout: "wide",  //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
                direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
            });


        })(jQuery);

                    @if(Session::has('message'))
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                            toastr.success("{{ session('message') }}");
                    @endif

                    @if(Session::has('error'))
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                            toastr.error("{{ session('error') }}");
                    @endif

                    @if(Session::has('info'))
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                            toastr.info("{{ session('info') }}");
                    @endif

                    @if(Session::has('warning'))
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                            toastr.warning("{{ session('warning') }}");
                    @endif
                    
                    @if(Session::has('success'))
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                            toastr.success("{{ session('success') }}");
                    @endif
       
    </script>

</body>

</html>