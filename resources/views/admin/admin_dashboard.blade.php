@extends('admin.includes.master-new')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">
   <!-- main-header -->
   @include('admin/includes/header-new')
   <!-- /main-header -->
   <!-- container -->
   <!-- HOME SECTION ONE -->
   <div class="home-section-one">
      <div class="right-body">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8 d-lg-block d-none section-left">
                  <!-- Carousel -->
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img class="d-block w-100" src="<?php echo asset('assets/images/dashboard/dashboard-banner.png') ?>" alt="First slide">
                           <div class="carousel-caption d-none d-md-block">
                              <h5 class="tx-24-f">Maximize your Gig’s potential</h5>
                              <p class="tx-16-f">From fast delivery to revisions, earn with Extras.</p>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <img class="d-block w-100" src="<?php echo asset('assets/images/dashboard/dashboard-banner.png') ?>" alt="First slide">
                           <div class="carousel-caption d-none d-md-block">
                              <h5 class="tx-24-f">Maximize your Gig’s potential</h5>
                              <p class="tx-16-f">From fast delivery to revisions, earn with Extras.</p>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <img class="d-block w-100" src="<?php echo asset('assets/images/dashboard/dashboard-banner.png') ?>" alt="First slide">
                           <div class="carousel-caption d-none d-md-block">
                              <h5 class="tx-24-f">Maximize your Gig’s potential</h5>
                              <p class="tx-16-f">From fast delivery to revisions, earn with Extras.</p>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-12 section-right text-white">
                  <div class="p-3">
                     <h5>My Account</h5>
                     <div class="container">
                        <div class="row pt-3">
                           <div class="col-6">
                              <div class="br-18p b-w-1p b-bg-w p-2">
                                 <h5 class="">$5000</h5>
                                 <p class="mb-0">Available Balance</p>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="br-18p b-w-1p b-bg-w p-2">
                                 <h5 class="">$5000</h5>
                                 <p class="mb-0">Tota Balance</p>
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="br-12p b-w-1p b-bg-w mt-3 text-center">
                                 <button class="btn text-white text-center" >Withdraw</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- HOME SECTION ONE END -->
   <!-- SECTION TWO -->
   <div class="home-section-two pt-5">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-7 col-md-12  section-left chart">
               <!-- <canvas id="myChart" width="400" height="400"></canvas> -->
               <img class="w-100" src="<?php echo asset('assets/images/dashboard/chart.png') ?>">
               <!-- <div id="chart_div" style="width: 100%; height: 300px;"></div> -->
            </div>
            <div class="col-lg-5 col-md-12 section-right text-white">
               <div class="container">
                  <div class="row">
                     <div class="col-9 pt-3">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Master Right</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Performing Right</a>
                           </li>
                        </ul>
                     </div>
                     <div class="col-3">
                        <div class="dropdown">
                           <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Yearly
                           </button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                     <table class="table text-black">
                        <thead>
                           <tr>
                              <th scope="col" class="w-50">Shop Name</th>
                              <th scope="col" class="w-25">Income</th>
                              <th scope="col" class="w-25">Streams</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td><img class="" src="<?php echo asset('assets/images/dashboard/master-1.png') ?>">Spotify</td>
                              <td>$1,000</td>
                              <td>2,0021</td>
                           </tr>
                           <tr>
                              <td><img class="" src="<?php echo asset('assets/images/dashboard/master-2.png') ?>">Apple Music</td>
                              <td>$1,000</td>
                              <td>2,0021</td>
                           </tr>
                           <tr>
                              <td><img class="" src="<?php echo asset('assets/images/dashboard/master-4.png') ?>">Beatport</td>
                              <td>$1,000</td>
                              <td>2,0021</td>
                           </tr>
                           <tr>
                              <td><img class="" src="<?php echo asset('assets/images/dashboard/master-3.png') ?>">Soundcloud</td>
                              <td>$1,000</td>
                              <td>2,0021</td>
                           </tr>
                        </tbody>
                     </table>
                     <div class="container">
                        <div class="row">
                           <div class="col-6">
                              <button class="btn d-flex m-0 p-2"> <img class="pr-2" style="width: auto;" src="<?php echo asset('assets/images/dashboard/download-icon.png') ?>"> Download All</button>
                           </div>
                           <div class="col-6">
                              <div class="text-right p-3">
                                 <a class="text-black fw-500" href="">See All</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
               </div>
               <!--                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active text-black" id="Commentary">
                     <table class="table text-black">
                        <thead>
                           <tr>
                              <th scope="col" class="w-50">Shop Name</th>
                              <th scope="col" class="w-25">Income</th>
                              <th scope="col" class="w-25">Streams</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td><img class="" src="<?php echo asset('assets/images/dashboard/master-1.png') ?>">Spotify</td>
                              <td>$1,000</td>
                              <td>2,0021</td>
                           </tr>
                           <tr>
                              <td><img class="" src="<?php echo asset('assets/images/dashboard/master-2.png') ?>">Apple Music</td>
                              <td>$1,000</td>
                              <td>2,0021</td>
                           </tr>
                           <tr>
                              <td><img class="" src="<?php echo asset('assets/images/dashboard/master-3.png') ?>">Beatport</td>
                              <td>$1,000</td>
                              <td>2,0021</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div role="tabpanel" class="tab-pane fade text-black" id="Videos">Videos WP_Query goes here.</div>
                  </div> -->
            </div>
         </div>
      </div>
   </div>
   <!-- SECTION TWO END -->
   <!-- SECTION THREE -->
   <div class="home-section-three pt-5">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-7 col-md-12 domination">
               <div class="p-3 section-left">
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-11 col-10  p-3">
                           <h5>World Domination</h5>
                        </div>
                        <div class="col-lg-1 col-2 p-3">
                           <img class="" src="<?php echo asset('assets/images/dashboard/full-screen-icon.png') ?>">
                        </div>
                     </div>
                  </div>
                  <img class="" src="<?php echo asset('assets/images/dashboard/earth.png') ?>">
               </div>
            </div>
            <div class="col-lg-5 col-md-12 section-right">
               <div class="p-md-3 section-right">
                  <div class="container">
                     <div class="row pt-3 pb-3">
                        <div class="col-11">
                           <h5>Top Artists</h5>
                        </div>
                        <div class="col-1">
                           <div class="dropdown dropleft">
                              <i class="fas fa-ellipsis-v " data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false"></i>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                 <a class="dropdown-item" href="#">Action</a>
                                 <a class="dropdown-item" href="#">Another action</a>
                                 <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <table class="table text-black">
                     <thead>
                        <tr>
                           <th scope="col" class="w-5">Sr.</th>
                           <th scope="col" class="w-70">Names</th>
                           <th scope="col" class="w-25">Streams</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1.</td>
                           <td>
                              <div class="container">
                                 <div class="row">
                                    <div class="col-2  p-0">
                                       <img class="" src="<?php echo asset('assets/images/dashboard/artist-1.png') ?>">
                                    </div>
                                    <div class="col-10">
                                       <h5 class="mb-0 tx-14-f">Courtney Henry</h5>
                                       <p class="mb-0 tx-13-f">Song Name</p>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td>600,104</td>
                        </tr>
                        <tr>
                           <td>2.</td>
                           <td>
                              <div class="container">
                                 <div class="row">
                                    <div class="col-2 p-0">
                                       <img class="" src="<?php echo asset('assets/images/dashboard/artist-2.png') ?>">
                                    </div>
                                    <div class="col-10">
                                       <h5 class="mb-0 tx-14-f">Courtney Henry</h5>
                                       <p class="mb-0 tx-13-f">Song Name</p>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td>600,104</td>
                        </tr>
                        <tr>
                           <td>3.</td>
                           <td>
                              <div class="container">
                                 <div class="row">
                                    <div class="col-2 p-0">
                                       <img class="" src="<?php echo asset('assets/images/dashboard/artist-3.png') ?>">
                                    </div>
                                    <div class="col-10">
                                       <h5 class="mb-0 tx-14-f">Courtney Henry</h5>
                                       <p class="mb-0 tx-13-f">Song Name</p>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td>600,104</td>
                        </tr>
                        <tr>
                           <td>4.</td>
                           <td>
                              <div class="container">
                                 <div class="row">
                                    <div class="col-2 p-0">
                                       <img class="" src="<?php echo asset('assets/images/dashboard/artist-4.png') ?>">
                                    </div>
                                    <div class="col-10">
                                       <h5 class="mb-0 tx-14-f">Courtney Henry</h5>
                                       <p class="mb-0 tx-13-f">Song Name</p>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td>600,104</td>
                        </tr>
                        <tr>
                           <td>5.</td>
                           <td>
                              <div class="container">
                                 <div class="row">
                                    <div class="col-2 p-0">
                                       <img class="" src="<?php echo asset('assets/images/dashboard/artist-5.png') ?>">
                                    </div>
                                    <div class="col-10">
                                       <h5 class="mb-0 tx-14-f">Courtney Henry</h5>
                                       <p class="mb-0 tx-13-f">Song Name</p>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td>600,104</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- SECTION THREE END -->
   <!-- SECTION FOUR -->
   <div class="home-section-four pt-5">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-7 col-md-4 col-sm-4">
               <div class="p-lg-3">
                  <h5>Releases</h5>
               </div>
            </div>
         </div>
      </div>
      <style type="text/css">
         .custom-tabs .tab-one, .tab-two, .tab-three, .tab-four{
         background-color: white;
         border-radius: .5rem;
         }
         .custom-tabs .tab-one, .tab-two, .tab-three, .tab-four{
         margin-top: 12px;
         }
         .custom-tabs .tab-one.active{
         background-color: #3858F9;
         color: white;
         }
         .custom-tabs .tab-three.active{
         background-color: #3858F9;
         color: white;
         }
         .custom-tabs .tab-four.active{
         background-color: #3858F9;
         color: white;
         }
         .custom-tabs .tab-two.active{
         background-color: #3858F9;
         color: white;
         }
         /* .custom-tabs p{
         color:  #2D3144;
         }*/
         /*         .custom-tabs .tab-one:focus{
         background-color: black;
         }*/
         /*   .custom-tabs .tab-one h5{
         color: black;
         }*/
         .custom-tabs .tab-two h4{
         color: #FF4E5F;
         }
         .custom-tabs .tab-three h4{
         color: #219653;
         }
         .custom-tabs .tab-four h4{
         color: #6F42C1;
         }
         .custom-tabs .tab-one-padding, .tab-two-padding, .tab-three-padding, .tab-four-padding{
         padding: 15px;
         }
      </style>
      <!-- Tab Heading Section -->
      <div class="m-md-4">
         <div class="container-fluid custom-tabs">
            <div class="row">
               <div class="col-lg-3 col-6">
                  <div class="tab-one">
                     <div class="tab-one-padding">
                        <h4 class="tab-one-heading fw-bolder">14</h4>
                        <p  class="fw-500 fs-16p mb-0">Requests Releases</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Tab Content One-->
      <div class="m-4 row-1 tab-one-content" style="margin-top: 50px !important;">
         <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-action" role="tabpanel" aria-labelledby="pills-action-tab">
               <div class="tab-body-section" style="margin-top: 30px;">

                  @foreach($pending_releases as $action)

                  <div class="track-one">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-xl-2 col-lg-2 col-6">
                              <div class="pt-3 pl-3 pb-2 image-section">
                                 <img src="{{asset('storage/'.$pending_artwork[$loop->index]->image)}}">
                              </div>
                           </div>
                           <div class="col-xl-10 col-lg-10 col-6">
                              <div class="row">
                                 <!-- ONE -->
                                 <div class="col-xl-9 col-lg-9 col-md-12">
                                    <div class="pt-3 text-section-1">
                                       <p class="">
                                          <spa class="fw-500">
                                          NAME :</span> {{$action->title}}
                                       </p>
                                    </div>
                                 </div>
                                 <div class="col-xl-3 col-lg-3 col-md-12">
                                    <div class="pt-3 text-section-2">
                                       <div class="d-flex">
                                          <i class="fas fa-check-circle clr-green pt-1"></i>
                                          <p class="pl-2"> Submission Date: {{$submission_date[$loop->index]}}</p>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- TWO -->
                                 <div class="col-xl-12 col-12 d-lg-block d-none">
                                    <div class="d-flex">
                                       <span>
                                       <img style="width: auto;" src="<?php echo asset('assets/images/dashboard/mic-icon.png') ?>">
                                       &nbsp;Well
                                       </span>&nbsp;&nbsp;
                                       <span>
                                       <img style="width: auto;" src="<?php echo asset('assets/images/dashboard/single-icon.png') ?>">
                                       &nbsp;Single
                                       </span>&nbsp;&nbsp;
                                       <span>
                                       <img style="width: auto;" src="<?php echo asset('assets/images/dashboard/track-icon.png') ?>">
                                       &nbsp;{{$pending_track[$loop->index]}} Track
                                       </span>
                                    </div>
                                 </div>
                                 <!-- THREE -->
                                 <div class="col-xl-9 col-lg-9 col-md-12 d-lg-block d-none">
                                    <div class="pt-3">
                                       <h5>Your Action is Needed</h5>
                                       <p>Our team have noticed that your release needs a little work before we can send it off to stores</p>
                                    </div>
                                 </div>
                                 <div class="col-xl-3 col-lg-3 col-md-12">
                                    <div class="pt-3 btn-section">
                                       <a href="/admin/album/{{$album_pending[$loop->index]->id}}" type="button" class="btn released-btn">Check Release</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
            <!-- Tab one END-->
         </div>
      </div>

   </div>
   <!-- SECTION FOUR END -->
   <!-- /container -->
</div>
<!-- FORM POPUP -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
   Launch demo modal
   </button> -->
<!-- Modal -->
<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title fw-500" id="exampleModalLongTitle">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="form-close-icon">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <!--    <form class="col-md-6">
               <div class="form-group">
                  <label for="input1" class="col-sm-2">
                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Username</span></label>
                  <input type="text" class="form-control mt-n3" id="input1" value="boern">
               </div>
               </form> -->
            <form>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <div class="input-icons">
                        <i class="fa fa-user icon"></i>
                        <label for="firstName" class="col-sm-4"><span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">First Name</span></label>
                        <input type="text" style="padding-left: 35px;" class="form-control mt-n3 input-field" id="firstName">
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="input-icons">
                        <i class="fa fa-user icon"></i>
                        <label for="lastName" class="col-sm-4"><span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Last Name</span></label>
                        <input type="text" style="padding-left: 35px;" class="form-control mt-n3 input-field" id="lastName">
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="input-icons">
                        <i class="fa fa-user icon"></i>
                        <label for="userName" class="col-sm-2"><span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Username</span></label>
                        <input type="text" style="padding-left: 35px;" class="form-control mt-n3 input-field" id="userName">
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="input-icons">
                        <i class="fas fa-envelope icon"></i>
                        <label for="email" class="col-sm-2"><span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Email</span></label>
                        <input type="text" style="padding-left: 35px;" class="form-control mt-n3 input-field" id="email">
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="input-icons">
                        <i class="fas fa-phone-alt phone-icon"></i>
                        <label for="conNumber" class="col-sm-4"><span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Contact Number</span></label>
                        <input type="number" style="padding-left: 35px;" class="form-control mt-n3 input-field" id="conNumber">
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="input-icons">
                        <!-- <i class="fas fa-envelope icon"></i> -->
                        <label for="country" class="col-sm-2"><span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Country</span></label>
                        <select id="country" class="form-control mt-n3 select-payment">
                           <option selected>Select Country</option>
                           <option>Pakistan</option>
                           <option>America</option>
                           <option>UK</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="input-icons">
                        <!-- <i class="fas fa-envelope icon"></i> -->
                        <label for="payMethod" class="col-sm-4"><span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Payment Method</span></label>
                        <select id="payMethod" class="form-control mt-n3 select-payment">
                           <option selected>Select Payment Method</option>
                           <option>Payment 1</option>
                           <option>Payment 2</option>
                           <option>Payment 3</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="input-icons">
                        <!-- <i class="fas fa-phone-alt icon"></i> -->
                        <label for="password" class="col-sm-2"><span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Password</span></label>
                        <input type="number" style="padding-left: 35px;" class="form-control mt-n3 input-field" id="password">
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="input-icons">
                        <!-- <i class="fas fa-phone-alt icon"></i> -->
                        <label for="confPassword" class="col-sm-4"><span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Confirm Password</span></label>
                        <input type="number" style="padding-left: 35px;" class="form-control mt-n3 input-field" id="confPassword">
                     </div>
                  </div>
               </div>
               <div class="text-right">
                  <button type="submit" class="btn btn-one">Update</button>
                  <button type="submit" class="btn btn-primary btn-two">Update</button>
               </div>
            </form>
         </div>
         <!--   <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
      </div>
   </div>
</div>
@endsection
