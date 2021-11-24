@extends('admin.includes.master')
@section('title', 'accounts')
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
                <div class="mb-3 text-white">
                    <button class="btn btn-success rounded px-4 py-2 text-light border-0 outline-none"
                        id="accounts">Accounts</button>
                    <button class="btn btn-dark rounded px-4 py-2 text-light border-0 ml-2 outline-none"
                        id="add-account">Add
                        account</button>
                </div>
                {{-- @if (!empty($accounts)) --}}
                <div id="account-table"  class="table-responsive" style=" @if ($errors->any()) display:none; @endif">
                    <table class="table table-hover account-list-table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Country</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($accounts as $account)
                                <tr>
                                    <td scope="row">{{ $i }}</td>
                                    <td scope="row">
                                        @if ($account->company_name != '')
                                        {{ $account->company_name }} @else {{ '--- ' }}
                                        @endif
                                    </td>
                                    <td scope="row">{{ $account->user->email }}</td>
                                    <td scope="row">
                                        @if (!empty($account->user->username))
                                        {{ $account->user->username }} @else {{ '---' }} @endif
                                    </td>
                                    <td scope="row">
                                        @if (!empty($account->country))
                                        {{ $account->country }} @else {{ '---' }} @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('view_account_labels', $account->id) }}"
                                            class="btn btn-success m-1">View Labels</a>
                                        <a href="{{ route('edit_account', $account->id) }}"
                                            class="btn btn-success m-1">Edit</a>
                                        <a href="{{ route('delete_account', $account->id) }}"
                                            class="btn btn-danger m-1">Delete</a>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- @endif --}}
                <div id="add-account-form" class="shadow" style="@if ($errors->any()) display:block;
                @else display: none @endif">
                    <div class="form-heading theme-background text-white p-3 text-center mb-3">
                        <h1 class="display-4">Add Account</h1>
                    </div>
                    <form action="{{ route('store_account') }}" method="POST" class="p-3" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="company_name" class="label_style"><b
                                                class="@error('company_name') text-danger @enderror">Company
                                                Name</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('company_name') is-invalid @enderror"
                                                name="company_name" id="company_name" value="{{ old('company_name') }}">
                                            @error('company_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="email" class="label_style"><b
                                                class="@error('email') text-danger @enderror">Email</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="contact_email"
                                                class="form-control rounded @error('email') is-invalid @enderror"
                                                name="email" id="email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="username-f" class="label_style"><b
                                                class="@error('username') text-danger @enderror">Username</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('username') is-invalid @enderror"
                                                name="username" id="username-f" value="{{ old('username') }}">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="password-f" class="label_style"><b
                                                class="@error('password') text-danger @enderror">Password</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control rounded @error('password') is-invalid @enderror"
                                                name="password" id="password-f" value="{{ old('password') }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="password_confirmation" class="label_style"><b
                                                class="@error('password_confirmation') text-danger @enderror">Confirm
                                                Password</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control rounded @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" id="password_confirmation"
                                                value="{{ old('password_confirmation') }}">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="sections" class="label_style"><b
                                                class="@error('sections') text-danger @enderror">Sections</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row no-gutters">
                                            <div class="d-inline-block mr-2">
                                                <input type="checkbox" name="DISTRIBUTION" class="section"
                                                    id="section_for_1">
                                                <label for="section_for_1">DISTRIBUTION</label>
                                            </div>
                                            <div class="d-inline-block mr-2">
                                                <input type="checkbox" name="DISCOGRAPHY" class="section"
                                                    id="section_for_2">
                                                <label for="section_for_2">DISCOGRAPHY</label>
                                            </div>
                                            <div class="d-inline-block mr-2">
                                                <input type="checkbox" name="PROMOTIONS" class="section" id="section_for_3">
                                                <label for="section_for_3">PROMOTIONS</label>
                                            </div>
                                            <div class="d-inline-block mr-2">
                                                <input type="checkbox" name="LABEL_ARTIST" class="section"
                                                    id="section_for_4">
                                                <label for="section_for_4">LABEL/ARTIST</label>
                                            </div>
                                            <div class="d-inline-block mr-2">
                                                <input type="checkbox" name="MAILING" class="section" id="section_for_5">
                                                <label for="section_for_5">MAILING</label>
                                            </div>
                                            <div class="d-inline-block mr-2">
                                                <input type="checkbox" name="KATORZ" class="section" id="section_for_6">
                                                <label for="section_for_6">KATORZ </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="reset" value="Reset"
                                class="theme-background outline-none px-4 py-2 text-white border-0">
                            <input type="submit" value="Create Account"
                                class=" ml-3 theme-background outline-none px-4 py-2  text-white border-0">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /main-content-body -->
    </div>
    <!-- /container -->
    </div>
@endsection
@push('scripts')
    <script>
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

    </script>
@endpush
