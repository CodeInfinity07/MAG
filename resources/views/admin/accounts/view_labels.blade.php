@extends('admin.includes.master')
@section('title', 'labels')
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

                    <nav aria-account="breadcrumb">
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
                                    <span class="account ">LIFETIME EARNING</span>
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
                                    <span class="account">YOUR BALANCE</span>
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
              <!--   <div class="mb-3 text-white">
                    <button class="btn btn-success rounded px-4 py-2 text-light border-0 outline-none"
                        id="accounts">Accounts</button>
                    <button class="btn btn-dark rounded px-4 py-2 text-light border-0 ml-2 outline-none"
                        id="add-account">Add
                        account</button>
                </div> -->
                 @if (!empty($labels))
                    <div id="label-table"  class="table-responsive" style=" @if ($errors->any()) display:none; @endif">
                        <table class="table table-hover label-list-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
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
                                            @if (!empty($label->account->username))
                                            {{ $label->account->username }} @else {{ '--- ' }} @endif
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
                                            <a href="{{ route('edit_label', $label->id) }}"
                                                class="btn btn-success m-1">Edit</a>
                                            <a href="{{ route('view_account_artists', $label->id) }}"
                                                class="btn btn-success m-1">View Artists</a>
                                            <a href="{{ url('admin/delete_label/' . $label->id) }}"
                                                class="btn btn-danger m-1">Delete</a>
                                        </td>
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
@push('scripts')
    <!-- <script>
        $(document).ready(function() {
            //   account section
            $(document).on('click', '#add-account', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#accounts").removeClass('btn-success').addClass('btn-dark');
                $('#account-table').fadeOut(1000).promise().done(function() {
                    $('#add-account-form').fadeIn();
                });
            });
            $(document).on('click', '#accounts', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#add-account").removeClass('btn-success').addClass('btn-dark');
                $('#add-account-form').fadeOut(1000).promise().done(function() {
                    $('#account-table').fadeIn();
                });
            });
            $('.account-list-table').DataTable();
        });

    </script> -->
@endpush
