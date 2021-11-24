@extends('user.layouts.index')

@section('content')
    <!-- PRE LOADER -->
    <style>
        @media(max-width:767px) {
            .main_logo {
                display: none !important;
            }
        }

    </style>
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>


    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header" style="width: 100%;">
                <a href="/" style="width: 100%;" class="navbar-brand navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <center><img src="{{ asset('/') }}pnglogo.png" style="width:141px;margin-top: -41px;"
                            class="img-responsive" alt="Thin Laptop"></center>
                </a>


                <!-- lOGO TEXT HERE -->
                <a href="/" style="width: 100%;margin-top:-4px;" class="navbar-brand main_logo">
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
    <section id="home" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <form action="{{ route('user.register') }}" method="post">
                    @csrf
                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                        <div class="home-info">
                            <h3>Create will do the rest</h3>
                            <h2 style="color:white;">MaDigital is the easiest way to sell your music</h2>
                            <!-- <h1>We help you manage your website successfully!</h1> -->
                            <h3>Enter your Email Below</h3>

                            <div class="online-form">
                                <input type="email" name="email"
                                    style="color:white;background-color: rgba(136, 143, 150, 0.671);"
                                    class="form-control border border-danger" placeholder="Enter your email">
                                <a href="packages.html">
                                    <button style="background-color:rgb(184, 43, 43)" type="submit" class="form-control">Get
                                        started</button>
                                </a>
                                @error('email')
                                    <br><b class="text-danger" style="display: block;margin-top: 5px;">{{ $message }}</b>
                                @enderror
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
