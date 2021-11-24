@extends('user.layouts.index')

@section('content')
     <!-- PRE LOADER -->
     <section class="preloader">
        <div class="spinner">

             <span class="spinner-rotate"></span>
             
        </div>
   </section>


   <!-- MENU -->
   <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

             <div class="navbar-header">
                  <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                       <span class="icon icon-bar"></span>
                       <span class="icon icon-bar"></span>
                       <span class="icon icon-bar"></span>
                  </button>

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


   <!-- FEATURE -->
   


   <!-- FEATURE -->
  

   <!-- ABOUT -->
   

   


   <!-- PRICING -->
   <section id="home" data-stellar-background-ratio="0.5">
        <div class="container">
             <div class="row">

                  <div class="col-md-12 col-sm-12">
                       <div class="section-title">
                            <h1>Register</h1>
                       </div>
                  </div>
                  <form method="POST" action="{{ route('seller.auth') }}">
                    @csrf
                  <div class="col-md-2"></div>
                  <div class="col-md-8 col-sm-6 p-4">
                       <div class="pricing-thumb p-4" style="background-color:rgba(238, 227, 227, 0.801);">
                           <div class="pricing-title">
                                <h2></h2>
                           </div>
                           <div class="pricing-info">
                             <p><div class="form-group">
                              <label for="exampleFormControlInput1">Email address</label>
                              <input type="email" class="form-control" id="exampleFormControlInput1" value="{{$email}}" placeholder="name@example.com">
                            </div></p>
                              
                               
                                <p><div class="form-group">
                                  <label for="exampleFormControlInput1">Password</label>
                                  <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                                </div></p>
                             
                              <!-- <p>asa</p> -->
                              
                                 
                                 
                           </div>
                           <div class="pricing-bottom">
                                 
                                 <a style="background-color:rgb(184, 43, 43)" href="Artist-login.html" class="section-btn pricing-btn">Register now</a>
                           </div>
                       </div>
                    </form>
                  </div>
                  <div class="col-md-2"></div>

                  
                  <!-- <div class="col-md-4 col-sm-6">
                       <div class="pricing-thumb">
                           <div class="pricing-title">
                                <h2>Professional</h2>
                           </div>
                           <div class="pricing-info">
                                 <p>100 Responsive Designs</p>
                                 <p>60 Dashboards</p>
                                 <p>5 TB Storage</p>
                                 <p>25 TB Bandwidth</p>
                                 <p>1-minute Support</p>
                           </div>
                           <div class="pricing-bottom">
                                 <span class="pricing-dollar">$550/mo</span>
                                 <a href="#" class="section-btn pricing-btn">Register now</a>
                           </div>
                       </div>
                  </div> -->
                  
             </div>
        </div>
   </section>   

@endsection