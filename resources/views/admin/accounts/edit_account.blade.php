@extends('admin.includes.master')
@section('title', 'accounts')
@section('content')
    <div class="main-content">
        {{-- {{ $account->company_name }}@php exit; @endphp --}}
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
            <div class="main-content-body">
                @if (Session::has('success'))
                    <div class="container">
                        <div class="col-sm-12">
                            <div>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-account="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            {{-- @endif --}}
            <div id="edit-account-form mt-5" class="shadow margin_top_107px">
                <div class="form-heading theme-background text-white p-3 text-center mb-3">
                    <h1 class="display-4">Edit Account</h1>
                </div>
                <form action="{{ route('update_account') }}" method="POST" class="p-3" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $account->id }}" name="id">
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
                                            name="company_name" id="company_name" value="{{ $account->company_name }}">
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
                                    <label for="accoout_type" class="label_style"><b
                                            class="@error('accoout_type') text-danger @enderror">Account Type</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <select type="text"
                                            class="form-control rounded @error('accoout_type') is-invalid @enderror"
                                            name="accoout_type" id="accoout_type" value="{{ old('accoout_type') }}">
                                            <option value="">Please Select...</option>
                                            <option value="Free Account">Free Account</option>
                                            <option value="Premiume Account">Premiume Account</option>
                                            <option value="Partner Account">Partner Account</option>
                                        </select>
                                        @error('accoout_type')
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
                                    <label for="email" class="label_style"><b
                                            class="@error('email') text-danger @enderror">Email</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control rounded @error('email') is-invalid @enderror" name="email"
                                            id="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-sm-12 ">
                            <div class="row">
                                <div class="col-sm-3 pl-4">
                                    <label for="telephone_acc" class="label_style"><b
                                            class="@error('telephone') text-danger @enderror">Telephone</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="" class="form-control rounded @error('telephone') is-invalid @enderror"
                                            name="telephone" id="telephone_acc" value="{{ $account->telephone }}">
                                        @error('telephone')
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
                                    <label for="fax_acc" class="label_style"><b
                                            class="@error('fax') text-danger @enderror">Fax</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="" class="form-control rounded @error('fax') is-invalid @enderror"
                                            name="fax" id="fax_acc" value="{{ $account->fax }}">
                                        @error('fax')
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
                                    <label for="vat_no" class="label_style"><b
                                            class="@error('vat_no') text-danger @enderror">VAT NO.</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="" class="form-control rounded @error('vat_no') is-invalid @enderror"
                                            name="vat_no" id="vat_no" value="{{ $account->vat_no }}">
                                        @error('vat_no')
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
                                    <label for="building_name_no-f" class="label_style"><b
                                            class="@error('building_name_no') text-danger @enderror">Building
                                            Name/No</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control rounded @error('building_name_no') is-invalid @enderror"
                                            name="building_name_no" id="building_name_no-f"
                                            value="{{ $account->building_name_no }}">
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
                                            class="form-control rounded @error('street') is-invalid @enderror" name="street"
                                            id="street-f" value="{{ $account->street }}">
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
                                        <input type="text" class="form-control rounded @error('area') is-invalid @enderror"
                                            name="area" id="area-f" value="{{ $account->area }}">
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
                                        <input type="text" class="form-control rounded @error('town') is-invalid @enderror"
                                            name="town" id="town-f" value="{{ $account->town }}">
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
                                            class="form-control rounded @error('county') is-invalid @enderror" name="county"
                                            id="county-f" value="{{ $account->county }}">
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
                                            name="post_code" id="post_code-f" value="{{ $account->post_code }}">
                                        @error('post_code')
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
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-3 pl-4">
                                    <label for="" class="label_style"><b
                                            class="@error('update_logo') text-danger @enderror">Update Logo
                                        </b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group yes_no_radio">
                                        <input type="radio" name="update_logo" class="yes_no_radio" id="update_logo_yes"
                                            value="1">
                                        <label for="update_logo_yes" class="label1">
                                            <span class="yes_no_span">Yes</span>
                                        </label>
                                        <input type="radio" name="update_logo" class="yes_no_radio" id="update_logo_no"
                                            value="0" checked>
                                        <label for="update_logo_no" class="label2">
                                            <span class="yes_no_span">No</span>
                                        </label>
                                        @error('update_logo')
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
                                            class="@error('show_feedback') text-danger @enderror">Show Feedback
                                        </b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group yes_no_radio">
                                        <input type="radio" name="show_feedback" class="yes_no_radio" id="show_feedback_1"
                                            value="1">
                                        <label for="show_feedback_1" class="label1">
                                            <span class="yes_no_span">Yes</span>
                                        </label>
                                        <input type="radio" name="show_feedback" class="yes_no_radio" id="show_feedback_2"
                                            value="0" checked>
                                        <label for="show_feedback_2" class="label2">
                                            <span class="yes_no_span">No</span>
                                        </label>
                                        @error('show_feedback')
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

                                        <div class="d-inline-block mx-1 my-3">
                                            <input type="checkbox" name="DISTRIBUTION" class="section" id="section_for_1"
                                                @if (!empty($account->section) && $account->section->distribution == 1) checked @endif>
                                            <label for="section_for_1">DISTRIBUTION</label>
                                        </div>
                                        <div class="d-inline-block mx-1 my-3">
                                            <input type="checkbox" name="DISCOGRAPHY" class="section" id="section_for_2" @if (!empty($account->section) && $account->section->discography == 1) checked @endif>
                                            <label for="section_for_2">DISCOGRAPHY</label>
                                        </div>
                                        <div class="d-inline-block mx-1 my-3">
                                            <input type="checkbox" name="PROMOTIONS" class="section" id="section_for_3" @if (!empty($account->section) && $account->section->promotions == 1) checked @endif>
                                            <label for="section_for_3">PROMOTIONS</label>
                                        </div>
                                        <div class="d-inline-block mx-1 my-3">
                                            <input type="checkbox" name="LABEL_ARTIST" class="section" id="section_for_4"
                                                @if (!empty($account->section) && $account->section->label_artist == 1) checked @endif>
                                            <label for="section_for_4">LABEL/ARTIST</label>
                                        </div>
                                        <div class="d-inline-block mx-1 my-3">
                                            <input type="checkbox" name="MAILING" class="section" id="section_for_5" @if (!empty($account->section) && $account->section->mailing == 1) checked @endif>
                                            <label for="section_for_5">MAILING</label>
                                        </div>
                                        <div class="d-inline-block mx-1 my-3">
                                            <input type="checkbox" name="KATORZ" class="section" id="section_for_6" @if (!empty($account->section) && $account->section->katorz == 1) checked @endif>
                                            <label for="section_for_6">KATORZ </label>
                                        </div>
                                        {{-- <select class="form-control rounded @error('sections') is-invalid @enderror"
                                            name="sections" id="sections" value="{{ old('sections') }}">
                                            <option value="">Please Select</option>
                                        </select> --}}
                                        @error('sections')
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
                                            name="facebook" id="facebook-f" value="{{ $account->facebook }}">
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
                                    <label for="MySpace-f" class="label_style"><b
                                            class="@error('my_space') text-danger @enderror">MySpace</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control rounded @error('my_space') is-invalid @enderror"
                                            name="my_space" id="MySpace-f" value="{{ $account->my_space }}">
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
                                    <label for="SoundCloud-f" class="label_style"><b
                                            class="@error('sound_cloud') text-danger @enderror">SoundCloud</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control rounded @error('sound_cloud') is-invalid @enderror"
                                            name="sound_cloud" id="sound_cloud-f" value="{{ $account->sound_cloud }}">
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
                                    <label for="twitter-f" class="label_style"><b
                                            class="@error('twitter') text-danger @enderror">Twitter</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control rounded @error('twitter') is-invalid @enderror"
                                            name="twitter" id="twitter-f" value="{{ $account->twitter }}">
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
                                    <label for="youtube-f" class="label_style"><b
                                            class="@error('youtube') text-danger @enderror">Youtube</b></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control rounded @error('youtube') is-invalid @enderror"
                                            name="youtube" id="youtube-f" value="{{ $account->youtube }}">
                                        @error('youtube')
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
                                        <textarea class="form-control rounded @error('biography') is-invalid @enderror"
                                            name="biography" id="BioGraphy"
                                            rows="10"> {{ $account->biography }}</textarea>

                                        @error('biography')
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
                        <input type="submit" value="Update Account"
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
