<?php
use Illuminate\Support\Facades\Auth;

$first_name = 'muddasar';
$last_name = 'habib';
$role_id = Auth::user()->role_id;
$role_name = Auth::user()->get_role_name->role_name;
?>
<!-- BEGIN LEFT SIDEBAR -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="main-sidebar app-sidebar sidebar-scroll">
    <div class="main-sidebar-header">
        <a class="desktop-logo logo-light active" href="" class="text-center mx-auto"
            style="padding-bottom: 70px !important">
            <img src="<?php echo asset('assets/img/logo.png'); ?>"
                style="object-fit:cover;height:90px;weight:90px;padding-bottom: 15px" class="main-logo">
        </a>
        <a class="desktop-logo icon-logo active" href="">
            <img src="<?php echo asset('assets/img/logo.png'); ?>"
                style="object-fit:cover;" class="logo-icon">
        </a>
        <a class="desktop-logo logo-dark active" href="">
            <img src="<?php echo asset('assets/img/logo.png'); ?>"
                class="main-logo dark-theme" alt="logo">
        </a>
        <a class="logo-icon mobile-logo icon-dark active" href="">
            <img src="<?php echo asset('assets/img/logo.png'); ?>"
                class="logo-icon dark-theme" alt="logo">
        </a>
    </div><!-- /logo -->
    <div class="main-sidebar-loggedin">
        <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
                <div class="user-pic">
                    @if (Auth::user()->picture == '')
                        <img src="<?php echo asset('assets/img/faces/6.jpg'); ?>"
                            alt="user-img" class="rounded-circle mCS_img_loaded">
                    @else
                        <img src="<?php echo asset('storage/image/' . Auth::user()->picture); ?>"
                            alt="user-img" class="rounded-circle mCS_img_loaded" style="object-fit: cover;">
                    @endif
                </div>
                <div class="user-info">
                    <h6 class=" mb-0 text-dark">{{ Auth::user()->name }}</h6>
                    <span class="text-muted app-sidebar__user-name text-sm"><?php echo $role_name; ?></span>
                </div>
            </div>
        </div>
    </div><!-- /user -->
    <div class="sidebar-navs">
        <ul class="nav  nav-pills-circle">
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings"
                aria-describedby="tooltip365540">
                <a class="nav-link text-center m-2" onclick="show_edit_model()" style="cursor:pointer;">
                    <i class="fe fe-settings"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chat">
                <a href="{{ route('messenger') }}" class="nav-link text-center m-2">
                    <i class="fe fe-mail"></i>
                </a>
            </li>
            <li class="nav-item" style="position: relative;" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="Followers">
                @if ($role_name == 'Label')
                    <a class="nav-link text-center m-2" style="cursor:pointer;" onclick="show_artist_model()">
                        <i class="fe fe-user"></i>
                    </a>
                    <div style="position: absolute;top: 2px;right: -1px;    background: linear-gradient( 45deg, #f54266, #3858f9);color: white; width: 22px; height: 22px;border-radius: 51px; font-size: 9px; display: flex;justify-content: center;align-items: center;font-weight: 700;"
                        class="number_artist">
                        {{ Auth::user()->artist_many }}
                    </div>
                @endif
                @if ($role_name == 'Account')
                    <a href="@php
                        switch ($role_name) {
                            case 'Account':
                                echo route('account.labels');
                                break;
                            case 'Admin':
                                echo '';
                                break;
                            default:
                                break;
                        }
                    @endphp" class="nav-link text-center m-2" style="cursor:pointer;">
                        <i class="fe fe-user"></i>
                    </a>
                @endif
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
                <a href="@if ($role_name=='Admin' ) {{ url('admin/logout') }} @else {{ url('account/logout') }} @endif"
                    class="nav-link text-center m-2">
                    <i class="fe fe-power"></i>
                </a>

            </li>
        </ul>
    </div>
    <div class="main-sidebar-body">
        <ul class="side-menu ">

            @if ($role_name == 'Admin')
                <li class="slide">
                    <a class="side-menu__item" href="@if ($role_name=='Admin' ) {{ url('admin/dashboard') }}  @else {{ url('account/logout') }} @endif"><i class="side-menu__icon fe fe-airplay"></i><span
                            class="side-menu__label">DASHBOARD</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="@if ($role_name=='Admin' ) {{ url('admin/new-dashboard') }}  @else {{ url('account/logout') }} @endif"><i class="side-menu__icon fe fe-airplay"></i><span
                            class="side-menu__label">NEW DASHBOARD</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="#"><i class="side-menu__icon fe fe-airplay"></i><span
                            class="side-menu__label">Releases</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="#"><i class="side-menu__icon fe fe-airplay"></i><span
                            class="side-menu__label">Promotions</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i
                            class="side-menu__icon fe fe-users menu-icons"></i><span class="side-menu__label">Label /
                            Artists</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item" id="artists-list" href="{{ route('admin.artists') }}">Artists</a>
                        </li>
                        <li>
                            <a class="slide-item" id="labels-list" href="{{ route('admin.labels') }}">Labels</a>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <i class="side-menu__icon fe fe-mail bg-dark"></i>
                        <span class="side-menu__label">Mailing</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="#">News Letters</a></li>
                        <li><a class="slide-item" href="#">Bounced / Unsubscribed</a></li>
                        <li><a class="slide-item" href="{{ route('mailing_list.contacts') }}">Contacts</a></li>
                        <li><a class="slide-item" href="{{ route('mailing_list') }}">Mailing Lists</a></li>
                        <li><a class="slide-item" href="{{ route('send_mail_view') }}">Send Mail</a></li>
                        <li><a class="slide-item" href="{{ route('send_mail_to_individual_view') }}">Send Mail
                                Individually</a></li>

                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="#"><i class="side-menu__icon fe fe-wifi"></i><span
                            class="side-menu__label">Data Feeds</span></a>
                </li>
                 <li class="slide">
                    <a class="side-menu__item" href="{{ route('group.index') }}"><i class="side-menu__icon fal fa-users"></i><span
                            class="side-menu__label">Groups</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="#"><i class="side-menu__icon fe fe-wifi"></i><span
                            class="side-menu__label">Reporting</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="#"><i class="side-menu__icon fe fe-wifi"></i><span
                            class="side-menu__label">Accounting</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <i class="side-menu__icon fe fe-user bg-dark"></i>
                        <span class="side-menu__label">Admin</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('accounts') }}">Accounts</a></li>
                        <li><a class="slide-item" href="#">Automated Emails</a></li>
                        <li><a class="slide-item" href="{{ route('users') }}">Users</a>

                    </ul>
                </li>
            @endif
            @if ($role_name != 'Admin')
                <li class="slide">
                    <a class="side-menu__item" href="{{ asset('dashboard_new') }}"><i
                            class="side-menu__icon fe fe-airplay"></i><span
                            class="side-menu__label">DASHBOARD</span></a>
                </li>
                @if(Auth::user()->role_id == 1)
                @if (Auth::user()->account->section->distribution == 1)
                    <li class="slide">
                        <a class="side-menu__item" href="{{ asset('distribution') }}"><i
                                class="side-menu__icon fe fe-database"></i><span
                                class="side-menu__label">DISTRIBUTION</span></a>
                    </li>
                @endif
                @if (Auth::user()->account->section->discography == 1)

                    <li class="slide">
                        <a class="side-menu__item" href="{{ asset('discography') }}"><i
                                class="side-menu__icon fe fe-layers"></i><span
                                class="side-menu__label">DISCOGRAPHY</span></a>
                    </li>
                @endif
                @if (Auth::user()->account->section->promotions == 1)

                    <li class="slide">
                        <a class="side-menu__item" href="{{ asset('discography') }}"><i
                                class="side-menu__icon fe fe-layers"></i><span
                                class="side-menu__label">PROMOTIONS</span></a>
                    </li>
                @endif
                @if (Auth::user()->account->section->label_artist == 1)

                    <li class="slide">
                        <a class="side-menu__item" href="{{ asset('artist') }}"><i
                                class="side-menu__icon fe fe-database"></i><span class="side-menu__label">LABEL /
                                ARTIST</span></a>
                    </li>
                @endif
                @if (Auth::user()->account->section->katorz == 1)

                    <li class="slide">
                        <a class="side-menu__item"
                            href="<?php echo asset('katorz_music'); ?>"><i
                                class="side-menu__icon fe fe-award"></i><span class="side-menu__label">KATORZ MUSIC FOR
                                ARTISTS</span></a>
                    </li>
                @endif
                    @endif
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i
                            class="side-menu__icon fe fe-mail menu-icons"></i><span
                            class="side-menu__label">SUPPORT</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item"
                                href="<?php echo asset('email'); ?>">MESSAGES</a>
                        </li>
                        <li><a class="slide-item"
                                href="<?php echo asset('email/send'); ?>">MESSAGE
                                COMPOSE</a>
                        </li>
                    </ul>
                </li>

            @endif
            <?php if ($role_name == 'Admin') { ?>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-box"></i><span
                        class="side-menu__label">APPS</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="#<?php
                // echo asset('dashboard/cards')
                ?>">Cards</a></li>
                    <li><a class="slide-item" href="#<?php
                // echo asset('dashboard/darggablecards')
                ?>">Darggablecards</a></li>
                    <li><a class="slide-item" href="#<?php
                // echo asset('dashboard/rangeslider')
                ?>">Range-slider</a></li>
                    <li><a class="slide-item" href="#<?php
                // echo asset('dashboard/calendar')
                ?>">Calendar</a></li>

                    <!--To be Done-->
                    <li><a class="slide-item" href="#<?php
                // echo asset('dashboard/contacts')
                ?>">Contacts</a></li>
                    <li><a class="slide-item" href="#<?php
                // echo asset('dashboard/image-compare')
                ?>">Image-compare</a></li>
                    <li><a class="slide-item" href="#<?php
                // echo asset('dashboard/notification')
                ?>">Notification</a></li>
                    <li><a class="slide-item" href="#<?php
                // echo asset('dashboard/widget-notification')
                ?>">Widget-notification</a></li>
                    <li><a class="slide-item" href="#<?php
                // echo asset('dashboard/treeview')
                ?>">Treeview</a></li>
                </ul>
            </li>
            <?php } ?>

            <?php if ($role_id == 1) { ?>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-disc"></i><span
                        class="side-menu__label">UPLOAD</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="<?php echo asset('upload/data_import'); ?>">UPLOAD</a>
                    </li>
                    <li><a class="slide-item"
                            href="<?php echo asset('upload/imported_data'); ?>">VIEW
                            UPLOADS</a></li>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>
</aside>
<!-- END LEFT SIDEBAR -->
