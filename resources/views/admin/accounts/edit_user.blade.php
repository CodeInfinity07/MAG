@extends('admin.includes.master')
@section('title', 'Users')
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
            <div class="main-content-body">
                @if (Session::has('success'))
                    <div class="container">
                        <div class="col-sm-12">
                            <div>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="content-body" style="margin-top: 7rem;">
                <div class="mb-3 text-white">
                    <button class="btn btn-success rounded px-4 py-2 text-light border-0 outline-none"
                        id="users">Users</button>
                    <button class="btn btn-dark rounded px-4 py-2 text-light border-0 ml-2 outline-none"
                        id="update-user">Add
                        User</button>
                </div>
                {{-- @if (!empty($users)) --}}
                <div id="user-table" style=" @if ($errors->any()) display:none; @endif">
                    <table class="table table-hover user-list-table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Country</th>
                                <th scope="col">Contact No</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            {{-- @foreach ($users as $user)

                                    <tr>
                                        <td scope="row">{{ $i }}</td>
                                        <td scope="row">
                                            @if ($user->first_name != '')
                                                {{ $user->first_name }} @else {{ '--- ' }} @endif @if ($user->last_name != '')
                                                    {{ $user->last_name }} @endif
                                        </td>
                                        <td scope="row">{{ $user->email }}</td>
                                        <td scope="row">{{ $user->username }}</td>
                                        <td scope="row">
                                            @if ($user->username != '')
                                            {{ $user->username }} @else {{ '---' }} @endif
                                        </td>
                                        <td scope="row">
                                            @if ($user->contact_no != '')
                                            {{ $user->contact_no }} @else {{ '---' }} @endif
                                        </td>
                                        <td scope="row">
                                            @if ($user->gender != '')
                                            {{ $user->gender }} @else {{ '---' }} @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success">Edit</a>
                                            <a href="{{ url('admin/delete_user/' . $user->id) }}"
                                                class="btn btn-danger ml-2">Delete</a>
                                        </td>
                                    </tr>
                                    @php $i++ @endphp
                                @endforeach --}}
                        </tbody>
                    </table>
                </div>
                {{-- @endif --}}
                <div id="update-user-form" class="shadow" style=" @if ($errors->any()) display:block;
                @else display: none @endif" style="">
                    <div class="form-heading theme-background text-white p-3 text-center mb-3">
                        <h1 class="display-4">Update User</h1>
                    </div>
                    <form action="#" method="POST" class="p-3" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="username_f" class="label_style"><b
                                                class="@error('username') text-danger @enderror">Username</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('username') is-invalid @enderror"
                                                name="username" id="username_f" value="{{ old('username') }}">
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
                                        <label for="email" class="label_style"><b
                                                class="@error('email') text-danger @enderror">Email</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="email"
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
                                        <label for="fname_f" class="label_style"><b
                                                class="@error('fname') text-danger @enderror">ForName</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('fname') is-invalid @enderror"
                                                name="fname" id="fname_f" value="{{ old('fname') }}">
                                            @error('fname')
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
                                        <label for="surname_f" class="label_style"><b
                                                class="@error('surname') text-danger @enderror">SurName</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('surname') is-invalid @enderror"
                                                name="surname" id="surname_f" value="{{ old('surname') }}">
                                            @error('surname')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="" class="label_style"><b
                                                class="@error('update_photo') text-danger @enderror">Update Photo
                                            </b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group yes_no_radio">
                                            <input type="radio" name="update_photo" class="yes_no_radio"
                                                id="update_logo_yes" value="1">
                                            <label for="update_logo_yes" class="label1">
                                                <span class="yes_no_span">Yes</span>
                                            </label>
                                            <input type="radio" name="update_photo" class="yes_no_radio" id="update_logo_no"
                                                value="0" checked>
                                            <label for="update_logo_no" class="label2">
                                                <span class="yes_no_span">No</span>
                                            </label>
                                            @error('update_photo')
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
                                        <label for="password_f" class="label_style"><b
                                                class="@error('password') text-danger @enderror">Password</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control rounded @error('password') is-invalid @enderror"
                                                name="password" id="password_f" value="{{ old('password') }}">
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
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="phone_f" class="label_style"><b
                                                class="@error('phone') text-danger @enderror">Telephone</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('phone') is-invalid @enderror"
                                                name="phone" id="phone_f" value="{{ old('phone') }}">
                                            @error('phone')
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
                                        <label for="sections" class="label_style"><b
                                                class="@error('sections') text-danger @enderror">Sections</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('sections') is-invalid @enderror"
                                                name="sections" id="sections" value="{{ old('sections') }}">
                                                <option value="">Please Select</option>
                                            </select>
                                            @error('sections')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="" class="label_style"><b
                                                class="@error('admin_user?') text-danger @enderror">Admin User
                                            </b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group yes_no_radio">
                                            <input type="radio" name="admin_user?" class="yes_no_radio" id="update_logo_no"
                                                value="0" checked>
                                            <label for="update_logo_no" class="label2">
                                                <span class="yes_no_span">No - Only View Specific Accounts</span>
                                            </label>
                                            <input type="radio" name="admin_user?" class="yes_no_radio" id="update_logo_yes"
                                                value="1">
                                            <label for="update_logo_yes" class="label1">
                                                <span class="yes_no_span">Yes - Can View All Accounts</span>
                                            </label>
                                            @error('admin_user?')
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
                                        <label for="accounts?" class="label_style"><b
                                                class="@error('accounts?') text-danger @enderror">Accounts</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('accounts?') is-invalid @enderror"
                                                name="accounts?" id="accounts?" value="{{ old('accounts?') }}">
                                                <option value="">Please Select</option>
                                            </select>
                                            @error('accounts?')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="reset" value="Reset"
                                class="theme-background outline-none px-4 py-2 text-white border-0">
                            <input type="submit" value="Update User"
                                class=" ml-3 theme-background outline-none px-4 py-2  text-white border-0">
                        </div>
                    </form>
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
            $(document).ready(function() {
                //   account section 
                $(document).on('click', '#update-user', function() {
                    $(this).removeClass('btn-dark').addClass('btn-success');
                    $("#users").removeClass('btn-success').addClass('btn-dark');
                    $('#user-table').fadeOut(1000).promise().done(function() {
                        $('#update-user-form').fadeIn();
                    });
                });
                $(document).on('click', '#users', function() {
                    $(this).removeClass('btn-dark').addClass('btn-success');
                    $("#update-user").removeClass('btn-success').addClass('btn-dark');
                    $('#update-user-form').fadeOut(1000).promise().done(function() {
                        $('#user-table').fadeIn();
                    });
                });
                $('.user-list-table').DataTable();
            });
        });

    </script>
@endpush
