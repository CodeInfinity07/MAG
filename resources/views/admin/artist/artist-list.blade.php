@extends('admin.includes.master')
@section('title', 'Dashboard')
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
                        id="artists">Artists</button>
                    <button class="btn btn-dark rounded px-4 py-2 text-light border-0 ml-2 outline-none" id="add-artist">Add
                        Artist</button>
                </div>
                @if (!empty($artists))
                    <div id="artist-table"  class="table-responsive" style=" @if ($errors->any()) display:none; @endif">
                        <table class="table table-hover artist-list-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($artists as $artist)

                                    <tr>
                                        <td scope="row">{{ $i }}</td>
                                        <td scope="row">
                                            @if ($artist->first_name != '')
                                                {{ $artist->first_name }} @else {{ '--- ' }} @endif @if ($artist->last_name != '')
                                                    {{ $artist->last_name }} @endif
                                        </td>
                                        <td scope="row">
                                            @if (!empty($artist->contact_email))
                                                {{ $artist->contact_email }}@else {{ '---' }} @endif
                                        </td>
                                        <td scope="row">
                                            @if (!empty($artist->country))
                                                {{ $artist->country }}@else {{ '---' }} @endif
                                        </td>
                                        <td scope="row">
                                            @if (!empty($artist->telephone))
                                                {{ $artist->telephone }}@else {{ '---' }} @endif
                                        </td>
                                        <td scope="row">
                                            @if (!empty($artist->gender))
                                                {{ $artist->gender }}@else {{ '---' }} @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit_artist', $artist->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ url('admin/delete_artist/' . $artist->id) }}"
                                                class="btn btn-danger ml-2">Delete</a>
                                        </td>
                                    </tr>
                                    @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div id="add-artist-form" class="shadow" style=" @if ($errors->any()) display:block;
                @else display: none @endif">
                    <div class="form-heading theme-background text-white p-3 text-center mb-3">
                        <h1 class="display-4">Add Artist</h1>
                    </div>
                    <form action="{{ route('insert.artist') }}" method="POST" class="p-3" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h4 class="font-weight-light">Artist Details</h4>
                            </div>
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="name-f" class="label_style"><b
                                                class="@error('name') text-danger @enderror">Name</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('name') is-invalid @enderror" name="name"
                                                id="name-f" value="{{ old('name') }}">
                                            @error('name')
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
                                        <label for="labedl_id_f" class="label_style"><b
                                                class="@error('label_id') text-danger @enderror">Labels</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('label_id') is-invalid @enderror"
                                                name="label_id" id="labedl_id_f">
                                                <option value="">Please Select...</option>
                                                @foreach ($labels as $label_id)
                                                    <option value="{{ $label_id->id }}">{{ $label_id->label_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('label_id')
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
                                        <label for="email-f" class="label_style"><b
                                                class="@error('email') text-danger @enderror">Contact Email</b></label>
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
                            </div>
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
                                        <label for="gender-f" class="label_style"><b
                                                class="@error('gender') text-danger @enderror">Gender</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="form-control rounded @error('gender') is-invalid @enderror"
                                                name="gender" id="gender-f">
                                                <option value="">Please Select...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            @error('gender')
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
                                        <label for="fname-f" class="label_style"><b
                                                class="@error('fname') text-danger @enderror">First Name</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('fname') is-invalid @enderror"
                                                name="fname" id="fname-f" value="{{ old('fname') }}">
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
                                        <label for="lname-f" class="label_style"><b
                                                class="@error('lname') text-danger @enderror">Last Name</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('lname') is-invalid @enderror"
                                                name="lname" id="lname-f" value="{{ old('lname') }}">
                                            @error('lname')
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
                                        <label for="phone-f" class="label_style"><b
                                                class="@error('phone') text-danger @enderror">Telephone</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('phone') is-invalid @enderror"
                                                name="phone" id="phone-f" value="{{ old('phone') }}">
                                            @error('phone')
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
                                        <label for="photo" class="label_style @error('img') is-invalid @enderror"><b>Image
                                            </b></label>
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
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="" class="label_style"><b
                                                class="@error('release_feed') text-danger @enderror">Release Feed
                                            </b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group yes_no_radio">
                                            <input type="radio" name="release_feed" class="yes_no_radio" id="release_feed_1"
                                                value="1">
                                            <label for="release_feed_1" class="label1">
                                                <span class="yes_no_span">Show</span>
                                            </label>
                                            <input type="radio" name="release_feed" class="yes_no_radio" id="release_feed_2"
                                                value="0">
                                            <label for="release_feed_2" class="label2">
                                                <span class="yes_no_span">Hide</span>
                                            </label>
                                            @error('release_feed')
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
                                                class="@error('artist_feed') text-danger @enderror">Artist Feed
                                            </b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group yes_no_radio">
                                            <input type="radio" name="artist_feed" class="yes_no_radio" id="artist_feed_1"
                                                value="1">
                                            <label for="artist_feed_1" class="label1">
                                                <span class="yes_no_span">Show</span>
                                            </label>
                                            <input type="radio" name="artist_feed" class="yes_no_radio" id="artist_feed_2"
                                                value="0">
                                            <label for="artist_feed_2" class="label2">
                                                <span class="yes_no_span">Hide</span>
                                            </label>
                                            @error('artist_feed')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 margin_bottom">
                                <h4 class="font-weight-light">Address Details</h4>
                            </div>
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="building_name_no-f" class="label_style"><b
                                                class="@error('building_name_no') text-danger @enderror">Building
                                                Name/No</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('building_name_no') is-invalid @enderror"
                                                name="building_name_no" id="building_name_no-f"
                                                value="{{ old('building_name_no') }}">
                                            @error('building_name_no')
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
                                        <label for="street-f" class="label_style"><b
                                                class="@error('street') text-danger @enderror">Street</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('street') is-invalid @enderror"
                                                name="street" id="street-f" value="{{ old('street') }}">
                                            @error('street')
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
                                        <label for="area-f" class="label_style"><b
                                                class="@error('area') text-danger @enderror">Area</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('area') is-invalid @enderror" name="area"
                                                id="area-f" value="{{ old('area') }}">
                                            @error('area')
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
                                        <label for="town-f" class="label_style"><b
                                                class="@error('town') text-danger @enderror">Town</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('town') is-invalid @enderror" name="town"
                                                id="town-f" value="{{ old('town') }}">
                                            @error('town')
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
                                        <label for="county-f" class="label_style"><b
                                                class="@error('county') text-danger @enderror">County</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('county') is-invalid @enderror"
                                                name="county" id="county-f" value="{{ old('county') }}">
                                            @error('county')
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
                                        <label for="post_code-f" class="label_style"><b
                                                class="@error('post_code') text-danger @enderror">Post Code</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('post_code') is-invalid @enderror"
                                                name="post_code" id="post_code-f" value="{{ old('post_code') }}">
                                            @error('post_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 margin_bottom">
                                <h4 class="font-weight-light">Social Links</h4>
                            </div>
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="apple_profile-f" class="label_style"><b
                                                class="@error('apple_profile') text-danger @enderror">Apple Music
                                                Profile?</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select
                                                class="form-control rounded @error('apple_profile') is-invalid @enderror"
                                                name="apple_profile" id="apple_profile-f">
                                                <option value="">Please Select...</option>
                                                <option value="exist">Artist Already Exist on Apple Music</option>
                                                <option value="request">Request new Apple Music Artist Profile</option>
                                            </select>
                                            @error('apple_profile')
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
                                        <label for="apple_music_url-f" class="label_style"><b
                                                class="@error('apple_music_url') text-danger @enderror">Apple Music
                                                URL</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('apple_music_url') is-invalid @enderror"
                                                name="apple_music_url" id="apple_music_url-f"
                                                value="{{ old('apple_music_url') }}">
                                            @error('apple_music_url')
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
                                        <label for="sound_cloud-f" class="label_style"><b
                                                class="@error('sound_cloud') text-danger @enderror">Sound cloud</b></label>
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
                                        <label for="spotify_profile-f" class="label_style"><b
                                                class="@error('spotify_profile') text-danger @enderror">Spotify
                                                Profile?</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select
                                                class="form-control rounded @error('spotify_profile') is-invalid @enderror"
                                                name="spotify_profile" id="spotify_profile-f">
                                                <option value="">Please Select...</option>
                                                <option value="exist">Artist Already Exist on Spotify</option>
                                                <option value="request">Request new Spotify Artist Profile</option>
                                            </select>
                                            @error('spotify_profile')
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
                                        <label for="spotify_url-f" class="label_style"><b
                                                class="@error('spotify_url') text-danger @enderror">Spotify
                                                URL</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('spotify_url') is-invalid @enderror"
                                                name="spotify_url" id="spotify_url-f" value="{{ old('spotify_url') }}">
                                            @error('spotify_url')
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
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="reset" value="Reset"
                                class="theme-background outline-none px-4 py-2 text-white border-0">
                            <input type="submit" value="Create Artist"
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
            //   account section 
            $(document).on('click', '#add-artist', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#artists").removeClass('btn-success').addClass('btn-dark');
                $('#artist-table').fadeOut(1000).promise().done(function() {
                    $('#add-artist-form').fadeIn();
                });

            });
            $(document).on('click', '#artists', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#add-artist").removeClass('btn-success').addClass('btn-dark');
                $('#add-artist-form').fadeOut(1000).promise().done(function() {
                    $('#artist-table').fadeIn();
                });
            });
            $('.artist-list-table').DataTable();
        });

    </script>
@endpush
