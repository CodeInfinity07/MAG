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
                <div class="mb-3 text-white">
                    <button class="btn btn-success rounded px-4 py-2 text-light border-0 outline-none"
                        id="labels">Labels</button>
                    <button class="btn btn-dark rounded px-4 py-2 text-light border-0 ml-2 outline-none" id="add-label">Add
                        Label</button>
                </div>
                @if (!empty($labels))
                    <div id="label-table" class="table-responsive" style=" @if ($errors->any()) display:none; @endif">
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
                                            <a href="{{ route('view_artists', $label->id) }}"
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
                <div id="add-label-form" class="shadow" style=" @if ($errors->any()) display:block;
                @else display: none @endif">
                    <div class="form-heading theme-background text-white p-3 text-center mb-3">
                        <h1 class="display-4">Add Label</h1>
                    </div>
                    <form action="{{ route('insert.label') }}" method="POST" class="p-3" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="label_name-f" class="label_style"><b
                                                class="@error('label_name') text-danger @enderror">Label Name</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('label_name') is-invalid @enderror"
                                                name="label_name" id="label_name-f" value="{{ old('label_name') }}">
                                            @error('label_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-12 ">
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
                            </div> --}}

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="account-f" class="label_style"><b
                                                class="@error('account') text-danger @enderror">Account</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('account') is-invalid @enderror"
                                                name="account" id="account-f">
                                                <option value="">Please Select...</option>
                                                @foreach ($accounts as $account)
                                                    <option value="{{ $account->id }}">{{ $account->company_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('account')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="email-f" class="label_style"><b
                                                class="@error('email') text-danger @enderror">Email</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control rounded @error('email') is-invalid @enderror"
                                                name="email" id="email-f" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="country-f" class="label_style"><b
                                                class="@error('country') text-danger @enderror">Country</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select name="country"
                                                class="form-control rounded  @error('country') is-invalid @enderror"
                                                name="country" id="country">
                                                <option value="">Select Country</option>
                                                @include('admin.includes.countries')
                                            </select>
                                            @error('country')
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
                                        <label for="beatport-f" class="label_style"><b
                                                class="@error('beatport') text-danger @enderror">BearPort</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('beatport') is-invalid @enderror"
                                                name="beatport" id="beatport-f">
                                                <option value="">Please Select...</option>
                                            </select>
                                            @error('beatport')
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
                                        <label for="traxsource-f" class="label_style"><b
                                                class="@error('traxsource') text-danger @enderror">Traxsource</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('traxsource') is-invalid @enderror"
                                                name="traxsource" id="traxsource-f">
                                                <option value="">Please Select...</option>
                                            </select>
                                            @error('traxsource')
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
                                        <label for="website-f" class="label_style"><b
                                                class="@error('website') text-danger @enderror">Website</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('website') is-invalid @enderror"
                                                name="website" id="website-f" value="{{ old('website') }}">
                                            @error('website')
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
                                        <label for="MySpace-f" class="label_style"><b
                                                class="@error('my_space') text-danger @enderror">MySpace</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('my_space') is-invalid @enderror"
                                                name="my_space" id="MySpace-f" value="{{ old('my_space') }}">
                                            @error('my_space')
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
                                        <label for="facebook-f" class="label_style"><b
                                                class="@error('facebook') text-danger @enderror">Facebook</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('facebook') is-invalid @enderror"
                                                name="facebook" id="facebook-f" value="{{ old('facebook') }}">
                                            @error('facebook')
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
                                        <label for="twitter-f" class="label_style"><b
                                                class="@error('twitter') text-danger @enderror">Twitter</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('twitter') is-invalid @enderror"
                                                name="twitter" id="twitter-f" value="{{ old('twitter') }}">
                                            @error('twitter')
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
                                        <label for="SoundCloud-f" class="label_style"><b
                                                class="@error('sound_cloud') text-danger @enderror">SoundCloud</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('sound_cloud') is-invalid @enderror"
                                                name="sound_cloud" id="sound_cloud-f" value="{{ old('sound_cloud') }}">
                                            @error('sound_cloud')
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
                                        <label for="youtube-f" class="label_style"><b
                                                class="@error('youtube') text-danger @enderror">Youtube</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('youtube') is-invalid @enderror"
                                                name="youtube" id="youtube-f" value="{{ old('youtube') }}">
                                            @error('youtube')
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
                                        <label for="genre-1-f" class="label_style"><b
                                                class="@error('genre_1') text-danger @enderror">Genre 1</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('genre_1') is-invalid @enderror"
                                                name="genre_1" id="genre-1-f">
                                                <option value="">Please Select...</option>
                                            </select>
                                            @error('genre_1')
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
                                        <label for="genre-2-f" class="label_style"><b
                                                class="@error('genre_2') text-danger @enderror">Genre 2</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('genre_2') is-invalid @enderror"
                                                name="genre_2" id="genre-2-f">
                                                <option value="">Please Select...</option>
                                            </select>
                                            @error('genre_2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 margin_bottom">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="photo"
                                            class="label_style @error('img') is-invalid @enderror"><b>Photo</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <label for="img"
                                                        class="no_img_btn bg-white @error('img') is-invalid @enderror"
                                                        style="width: 100%;">Select</label>
                                                    <input type="file" class="change_image" name="img" id="img"
                                                        style="display: none;">
                                                </div>
                                            </div>

                                        </div>
                                        <div id="selectedImg_div" style="display:none;postion:relative">
                                            <img id="selectedImg"
                                                style="width: 100px;height:100px;border-radius:50%;object-fit:cover;">
                                            <span>x</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 margin_bottom">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="Compilations_Label_f" class="label_style"><b
                                                class="@error('compilations_label') text-danger @enderror">Compilations
                                                Label</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group yes_no_radio">
                                            <input type="radio" name="compilations_label" class="yes_no_radio" id="opt1"
                                                value="1">
                                            <label for="opt1" class="label1">
                                                <span class="yes_no_span">YES</span>
                                            </label>
                                            <input type="radio" name="compilations_label" class="yes_no_radio" id="opt2"
                                                value="0">
                                            <label for="opt2" class="label2" checked>
                                                <span class="yes_no_span">NO</span>
                                            </label>
                                            @error('compilations_label')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 margin_bottom">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="parent_label_f" class="label_style"><b
                                                class="@error('parent_label') text-danger @enderror">Parent
                                                Label</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('parent_label') is-invalid @enderror"
                                                name="parent_label" id="parent_label_f">
                                                <option value="">Please Select...</option>
                                                @foreach ($labels as $label)
                                                    <option value="{{ $label->id }}">{{ $label->label_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('parent_label')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 margin_bottom">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="BioGraphy" class="label_style"><b
                                                class="@error('biography') text-danger @enderror">BioGraphy</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <textarea rows="10"
                                                class="form-control rounded @error('biography') is-invalid @enderror"
                                                name="biography" id="BioGraphy">

                                                                                                                                                                                                                                                                                        </textarea>
                                            @error('biography')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 margin_bottom">
                                <div class="row">
                                    <div class="col-md-3 col-12 pl-4">
                                        <label for="range-p" class="label_style"><b>How Much Artists?</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="range-output"></div>
                                        </div>
                                        <input type="range" name="artist_many"
                                            class="form-control @error('artist_many')
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        is-invalid @enderror"
                                            min="1" max="20" value="5" class="slider" id="myRange">
                                        <script>
                                            var slider = document.getElementById("myRange");
                                            var output = document.getElementById("range-output");
                                            output.innerHTML = slider.value;
                                            slider.oninput = function() {
                                                output.innerHTML = this.value;
                                            }

                                        </script>
                                        @error('artist_many')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="reset" value="Reset"
                                class="theme-background outline-none px-4 py-2 text-white border-0">
                            <input type="submit" value="Create Label"
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
            $(document).on('click', '#add-label', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#labels").removeClass('btn-success').addClass('btn-dark');
                $('#label-table').fadeOut(1000).promise().done(function() {
                    $('#add-label-form').fadeIn();
                });

            });
            $(document).on('click', '#labels', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#add-label").removeClass('btn-success').addClass('btn-dark');
                $('#add-label-form').fadeOut(1000).promise().done(function() {
                    $('#label-table').fadeIn();
                });
            });
            $('.label-list-table').DataTable();
        });

    </script>
@endpush
