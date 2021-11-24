@extends('admin.includes.master')
@section('title', 'Labels')
@section('content')
    <div class="main-content">

        <!-- main-header -->
        @include('admin/includes/header')

        <!-- /main-header -->

        <!-- container -->
        <div class="container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div>
                    <div style="display: flex; align-items: center;">
                        <h4 class="content-title mb-2" style="padding-top: 6px;">Hi, welcome back!</h4>
                        &nbsp;&nbsp;&nbsp;
                        <div class="d-none d-xl-block d-lg-block">

                            <button class="btn btn-danger btn-rounded btn-block" onclick="show_Announcements();">
                                Announcements</button>
                        </div>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Project</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-auto">
                    <div class=" d-flex right-page">
                        <div class="d-flex justify-content-center mr-5">
                            <div class="">
                                <span class="d-block">
                                    <span class="label ">LIFETIME EARNING</span>
                                </span>
                                <span class="value">

                                </span>
                            </div>
                            <div class="ml-3 mt-2">
                                <span class="sparkline_bar31"></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="">
                                <span class="d-block">
                                    <span class="label">YOUR BALANCE</span>
                                </span>
                                <span class="value">

                                </span>
                            </div>
                            <div class="ml-3 mt-2">
                                <span class="sparkline_bar"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /breadcrumb -->
            <!-- main-content-body -->
            @include('layouts.alerts')
            <div class="content-body" style="margin-top: 7rem;">
                @if (!empty($labels))
                    <div id="label-table">
                        <table class="table table-hover label-list-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($labels as $label)
                                    <tr>
                                        <td scope="row">{{ $i }}</td>
                                        <td scope="row">
                                            @if ($label->label_name != '')
                                            {{ $label->label_name }} @else {{ '--- ' }} @endif
                                        </td>
                                        <td scope="row">
                                            @if (!empty($label->email))
                                            {{ $label->email }} @else {{ '--- ' }} @endif
                                        </td>
                                        <td scope="row">
                                            @if (!empty($label->country))
                                            {{ $label->country }} @else {{ '--- ' }} @endif
                                        </td>
                                        <td>
                                            <a onclick="show_artist_model({{ $label->id }})"
                                                class="nav-link btn btn-success pointer text-white">View
                                                Artists</a>
                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('account.artists', $label->id) }}"
                                                class="btn btn-success">View Artists</a>
                                        </td> --}}
                                        {{-- <td>
                                            <a href="{{ route('account.artists', $label->id) }}"
                                                class="btn btn-success">Add/Update Artists</a>
                                        </td> --}}
                                    </tr>
                                    @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
        <!-- /main-content-body -->
    </div>
    <!-- /container -->
    </div>
@endsection
