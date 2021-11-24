<?php
use Illuminate\Support\Facades\Auth;

$first_name='muddasar';
$last_name='habib';
$role_id =Auth::user()->role_id;
$role_name=Auth::user()->get_role_name->role_name;
// $segment = $this->uri->segment(2);
?>

<!-- BEGIN HEADER -->
<div class="main-header  side-header">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="app-sidebar__toggle mobile-toggle d-block d-lg-none" data-toggle="sidebar">
                <a class="open-toggle" href="#">
                    <i class="header-icons text-black" data-eva="menu-outline"></i>
                </a>
                <a class="close-toggle" href="#">
                    <i class="header-icons" data-eva="close-outline"></i>
                </a>
            </div>
            <div class="">
                <a href="index.html">
                    <img src="<?php echo asset('assets/images/dashboard/madigital-logo.png') ?>" class="logo-1">
                </a>
               <!--  <a href="index.html">
                    <img src="<?php echo asset('assets/img/brand/logo.png') ?>" class="logo-11">
                </a>
                <a href="index.html" class="d-none d-sm-block">
                    <img src="<?php echo asset('assets/img/brand/favicon-white.png') ?>" class="logo-2">
                </a>
                <a href="index.html">
                    <img src="<?php echo asset('assets/img/brand/favicon.png') ?>" class="logo-12">
                </a> -->
            </div>


            <div class="d-none d-lg-block">
                <ul class="header-megamenu-dropdown nav d-flex align-items-center">
                <li class="nav-item mx-4">
                    <div class="btn-group">
                     <a href="" class="text-black font-weight-bold"><h3>  Dashboard </h3></a>
                    </div>
                </li>
                     <li class="nav-item mx-4">
                      <!-- Actual search box -->
                      <div class="form-group has-search d-flex align-items-center">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                </li>


            </ul>
            </div>
        </div>
        <div class="main-header-right">
            <!-- <div class="nav nav-item nav-link" id="bs-example-navbar-collapse-1">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="reset" class="btn btn-default">
                                <i class="fas fa-times"></i>
                            </button>
                            <button type="submit" class="btn btn-default nav-link">
                                <i class="fe fe-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div> -->
            <div class="nav nav-item  navbar-nav-right ml-auto">
               <!--  <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><i class="fe fe-maximize"></i></span></a>
                </div> -->

               <!--  <div class="form-group">
                        <div class="input-group date" id="datePicker">
                             <input type="text" class="form-control" name="date" value="">
                             <span class="input-group-addon">
                                  <i class="glyphicon glyphicon-calendar"></i>
                             </span>
                        </div>
                  </div> -->

                <div class="dropdown  nav-item main-header-message ">

                    <a class="new nav-link" href="#" >
                            <img src="<?php echo asset('assets/images/dashboard/message-icon.png') ?>">
                            <span class=" pulse-danger"></span>
                    </a>

                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary-gradient text-left d-flex">
                            <div class="">
                                <h6 class="menu-header-title text-white mb-0">5 new Messages</h6>
                            </div>
                            <div class="my-auto ml-auto">
                                <a class="badge badge-pill badge-warning float-right" href="#">Mark All Read</a>
                            </div>
                        </div>
                        <div class="main-message-list chat-scroll">
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="  drop-img  cover-image  " data-image-src="../assets/img/faces/3.jpg">
                                    <span class="avatar-status bg-teal"></span>
                                </div>

                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Paul Molive</h5>
                                        <p class="time mb-0 text-right ml-auto float-right">10 min ago</p>
                                    </div>
                                    <p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="drop-img cover-image" data-image-src="../assets/img/faces/2.jpg">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Sahar Dary</h5>
                                        <p class="time mb-0 text-right ml-auto float-right">13 min ago</p>
                                    </div>
                                    <p class="mb-0 desc">All set ! Now, time to get to you now......</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="drop-img cover-image" data-image-src="../assets/img/faces/9.jpg">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Khadija Mehr</h5>
                                        <p class="time mb-0 text-right ml-auto float-right">20 min ago</p>
                                    </div>
                                    <p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="drop-img cover-image" data-image-src="../assets/img/faces/12.jpg">
                                    <span class="avatar-status bg-danger"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Barney Cull</h5>
                                        <p class="time mb-0 text-right ml-auto float-right">30 min ago</p>
                                    </div>
                                    <p class="mb-0 desc">Here are some products ...</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="drop-img cover-image" data-image-src="../assets/img/faces/5.jpg">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">{{Auth::user()->username}}</h5>
                                        <p class="time mb-0 text-right ml-auto float-right">35 min ago</p>
                                    </div>
                                    <p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
                                </div>
                            </a>
                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="#">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#"><img src="<?php echo asset('assets/images/dashboard/bell-icon.png') ?>"><span class=" pulse"></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary-gradient text-left d-flex">
                            <div class="">
                                <h6 class="menu-header-title text-white mb-0">7 new Notifications</h6>
                            </div>
                            <div class="my-auto ml-auto">
                                <a class="badge badge-pill badge-warning float-right" href="#">Mark All Read</a>
                            </div>
                        </div>
                        <div class="main-notification-list Notification-scroll">
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-success-transparent">
                                    <i class="la la-shopping-basket text-success"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="notification-label mb-1">New Order Received</h5>
                                    <div class="notification-subtext">1 hour ago</div>
                                </div>
                                <div class="ml-auto" >
                                    <i class="las la-angle-right text-right text-muted"></i>
                                </div>
                            </a>
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-danger-transparent">
                                    <i class="la la-user-check text-danger"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="notification-label mb-1">22 verified registrations</h5>
                                    <div class="notification-subtext">2 hour ago</div>
                                </div>
                                <div class="ml-auto" >
                                    <i class="las la-angle-right text-right text-muted"></i>
                                </div>
                            </a>
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-primary-transparent">
                                    <i class="la la-check-circle text-primary"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="notification-label mb-1">Project has been approved</h5>
                                    <div class="notification-subtext">4 hour ago</div>
                                </div>
                                <div class="ml-auto" >
                                    <i class="las la-angle-right text-right text-muted"></i>
                                </div>
                            </a>
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-pink-transparent">
                                    <i class="la la-file-alt text-pink"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="notification-label mb-1">New files available</h5>
                                    <div class="notification-subtext">10 hour ago</div>
                                </div>
                                <div class="ml-auto" >
                                    <i class="las la-angle-right text-right text-muted"></i>
                                </div>
                            </a>
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-warning-transparent">
                                    <i class="la la-envelope-open text-warning"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="notification-label mb-1">New review received</h5>
                                    <div class="notification-subtext">1 day ago</div>
                                </div>
                                <div class="ml-auto" >
                                    <i class="las la-angle-right text-right text-muted"></i>
                                </div>
                            </a>
                            <a class="d-flex p-3" href="#">
                                <div class="notifyimg bg-purple-transparent">
                                    <i class="la la-gem text-purple"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="notification-label mb-1">Updates Available</h5>
                                    <div class="notification-subtext">2 days ago</div>
                                </div>
                                <div class="ml-auto" >
                                    <i class="las la-angle-right text-right text-muted"></i>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-footer">
                            <a href="#">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block">
                    <button type="button" class="btn">Logout</button>
                </div>


                <!-- <div class="dropdown main-header-message right-toggle">
                    <a class="nav-link pr-0" data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="ion ion-md-menu tx-20 bg-transparent"></i>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- END HEADER -->
