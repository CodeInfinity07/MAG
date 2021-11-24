@extends('user.layouts.index')

@section('content')
    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>

    <style>
        .select2-selection {
            padding-top: 6px !important;
            height: 43px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 70% !important;
        }

    </style>
    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="/" style="width: 100%;" class="navbar-brand navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <center><img src="{{ asset('/') }}pnglogo.png" style="width:141px;margin-top: -41px;"
                            class="img-responsive" alt="Thin Laptop"></center>
                </a>
                <!-- lOGO TEXT HERE -->
                <!-- <a href="index.html" class="navbar-brand"><img src="pnglogo.png" style="width:300px;" class="img-responsive" alt="Thin Laptop"></a> -->
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
    <!-- Register Form -->
    <section id="home" class="set_bg_image" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Term & Conditions</h1>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-6 p-4">
                    <div class="pricing-thumb p-4" style="background-color:rgba(238, 227, 227, 0.801);">
                        <div class="pricing-title">
                            <h2>
                                Please Read This Term & Condtion Carefully
                            </h2>
                        </div>
                        {{-- <form method="post" action="{{ url('register') }}">
                            {{ csrf_field() }} --}}
                        <div class="pricing-info">
                            <p class="text-left">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae nesciunt asperiores nostrum
                                delectus aliquam, soluta natus commodi recusandae aut corporis molestiae quibusdam ipsa
                                <br><br>
                                cupiditate. Voluptatum expedita aperiam aliquam illum pariatur.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, tempora? Quis
                                dignissimos<br><br>
                                obcaecati iste ad rem reiciendis vitae velit sit, at beatae repellat. Illum maiores<br><br>
                                repudiandae tenetur commodi voluptatibus. Repellat tempora voluptas voluptatibus explicabo!
                                Dolorem esse non, minima inventore assumenda ratione pariatur aperiam. Molestiae maxime
                                quo<br><br>
                                porro sed officia necessitatibus asperiores, est magnam aut vero magni dolore ut fugit
                                laboriosam culpa voluptas quis? Autem, delectus dolor! Voluptatibus quae eos qui
                                eligendi<br><br>
                                modi reiciendis voluptas quia asperiores. Cumque quibusdam ab veniam, necessitatibus
                                cupiditate recusandae voluptatibus tempora ipsa voluptas cum neque perspiciatis eius
                                vel.<br><br>
                                Eaque cupiditate vero, nihil fugiat dolorum perspiciatis autem?
                            </p>

                            <div class="form-group" style="text-align: left;">
                                <div>
                                    <input type="checkbox" id="terms_condition" required />
                                    <label for="terms_condition">
                                        Agree to <a href="https://www.google.com">terms</a> and <a
                                            href="https://www.google.com">conditions ?</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-bottom" style="    margin-bottom: 18px;">
                            <button type="submit" style="background-color:rgb(184, 43, 43)"
                                class="section-btn pricing-btn">Accept</button>
                        </div>
                        {{-- </form> --}}
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
@endsection
