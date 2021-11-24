<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Announcements</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/chat.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/chat/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/chat/structure.css')}}">
    <link rel="stylesheet" href="{{asset('css/chat/mailbox.css')}}">
    <!--Select2 Css-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<style>
    /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }
        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #a7a7a7;
        }
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #929292;
        }
        ul {
            margin: 0;
            padding: 0;
        }
        li {
            list-style: none;
        }
        .user-wrapper, .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;
        }
        .user-wrapper {
            max-height: 565px;
        }
        .user {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }
        .user:hover {
            background: #eeeeee;
        }
        .user:last-child {
            margin-bottom: 0;
        }
        .pending {
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 6px;
            color: #ffffff;
            font-size: 12px;
        }
        .media-left {
            margin: 0px;
        }
        .media-left img {
            width: 50px;
            border-radius: 64px;
        }
        .media-body p {
            margin: 2px 0;
        }
        .message-wrapper {
            padding: 10px;
            max-height: 400px;
            background: #eeeeee;
        }
        .messages .message {
            margin-bottom: 15px;
        }
        .messages .message:last-child {
            margin-bottom: 0;
        }

        .user .name{
            color: #0400f4 !important;
        }
        .received, .sent {
            padding: 3px 10px;
            border-radius: 10px;
        }
        .received {
            background: #ffffff;
        }
        .sent {
            background: #c7cff6;
            float: right;
            text-align: right;
        }
        .message p {
            margin: 5px 0;
        }
        .date {
            color: #777777;
            font-size: 12px;
        }
        .active {
            background: #eeeeee;
        }
        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }
        input[type=text]:focus {
            border: 1px solid #aaaaaa;
        }
    </style>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header d-flex justify-content-center">
               <img src="{{ asset('pnglogo.png') }}" class="img-responsive" alt="" style="width: 155px;">
            </div>
            <ul class="list-unstyled components">
                <p>Filters</p>
                <!-- <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li> -->
                <li class="{{ Request::segment(1) === 'messenger' ? 'active' : null }}">
                        <a href="{{ route('messenger') }}" class=" {{ Request::segment(1) === 'messenger' || Request::segment(1) === 'announcements'  ? 'active_s' : null}}">
                                <span>@lang('All Messages')</span>
                        </a>
                </li>

                <li class="{{ Request::segment(1) === 'announcements' ? 'active' : null }}">
                        <a href="{{ route('announcements') }}" class=" {{ Request::segment(1) === 'messenger' || Request::segment(1) === 'announcements'  ? 'active_s' : null}}">
                                <span>@lang('Announcements')</span>
                        </a>
                </li>
                <li>
                    <a href="">Bounce Backs</a>
                </li>
                <li>
                    <a href="#">Contracts</a>
                </li>
                <li>
                    <a href="#">Paid Invoices</a>
                </li>
                <li>
                    <a href="#">Unpaid Invoices</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="pt-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                        <ul class="nav navbar-nav ml-auto" style="align-items: center;">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">  <img src="{{asset('storage/profiles/' . auth()->user()->picture)}}" style="width: 30px;height: 30px;object-fit: cover;border-radius: 50px;" /></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">  <h3 class="pt-3 mt-0" style="    color: #808080b3;font-family: sans-serif;font-weight: 100;font-size: 12px;">{{auth()->user()->username}}</h3></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

    <!-- main content  -->
    @yield('content')



    <!-- jQuery CDN - Slim version (=without AJAX) -->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

     @stack('scripts')

</body>
</html>
