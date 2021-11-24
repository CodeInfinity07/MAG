@extends('user.layouts.index')

@section('content')
    <!-- PRE LOADER -->
    <style>
        @media(max-width:767px) {
            .main_logo {
                display: none !important;
            }

        }

        @media(max-width:450px) {
            .send_code_section {
                position: absolute !important;
                background-size: cover !important;
                height: 119vh !important;
            }
        }

    </style>
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>


    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header" style="    width: 100%;">
                <a href="/" style="width: 100%;" class="navbar-brand navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <center><img src="{{ asset('/') }}pnglogo.png" style="width:141px;margin-top: -41px;"
                            class="img-responsive" alt="Thin Laptop"></center>
                </a>
                <!-- lOGO TEXT HERE -->
                <a href="/" style="    width: 100%; margin-top: -4px;" class="navbar-brand main_logo">
                    <center><img src="{{ asset('/') }}pnglogo.png" style="width:300px;" class="img-responsive"
                            alt="Thin Laptop"></center>
                </a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="#home" class="smoothScroll">Home</a></li>
                                                                                               <li><a href="#feature" class="smoothScroll">Features</a></li>
                                                                                               <li><a href="#about" class="smoothScroll">About us</a></li>
                                                                                               <li><a href="#pricing" class="smoothScroll">Pricing</a></li>
                                                                                               <li><a href="#contact" class="smoothScroll">Contact</a></li>
                                                                                          </ul> -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="#">Say hello - <span>info@soft.co</span></a></li> -->
                    </ul>
            </div>

        </div>
    </section>


    <!-- FEATURE -->

    <section id="home" class="send_code_section">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <form action="{{ route('user.code') }}" method="post">
                    @csrf
                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                        <div class="home-info">
                            <h3>Create will do the rest</h3>
                            <h2 style="color:white;">
                                {{ $email }}
                            </h2>
                            @if (Session::has('success'))
                                <b style="color:#20ff8e;">{{ Session::get('success') }}</b><br>
                            @endif
                            @if (Session::has('error'))
                                <b class="text-danger">{{ Session::get('error') }}</b>
                            @endif
                            <!-- <h1>We help you manage your website successfully!</h1> -->
                            <h3>Enter your Code Below</h3>
                            <div class="online-form">
                                <input type="text" name="code"
                                    style="color:white;background-color: rgba(136, 143, 150, 0.671);" class="form-control"
                                    placeholder="Enter Your Code Here..." required>
                                <input style="background-color:rgb(184, 43, 43);margin-top: 30px; color:white;"
                                    type="submit" class="form-control" value="Verify">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- MENU -->


@endsection
