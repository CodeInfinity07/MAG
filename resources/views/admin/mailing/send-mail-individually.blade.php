@extends('admin.includes.master')
@section('title', 'Mailing List')
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

                    <nav aria-labelledby="breadcrumb">
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
                                    <span class="label">LIFETIME EARNING</span>
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
                <div id="add-mailing_list-form" class="shadow">
                    <div class="form-heading theme-background text-white p-3 text-center mb-3">
                        <h1 class="display-4">Mail</h1>
                    </div>
                    <form action="{{ route('send_mail_individually') }}" method="POST" class="p-3"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="selected_account" class="label_style"><b
                                                class="@error('selected_account') text-danger @enderror">Accounts</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="custom-select  @error('selected_account') is-invalid @enderror"
                                                name="selected_account" id="selected_account">
                                                <option value="">Please Select...</option>
                                                @foreach ($accounts as $account)
                                                    <option value="{{ $account->id }}">{{ $account->user->username }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('selected_account')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 choose-label" style="display: none">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="selected_label" class="label_style"><b
                                                class="@error('selected_label') text-danger @enderror">Labels</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="custom-select  @error('selected_account') is-invalid @enderror"
                                                name="selected_label" id="selected_label">
                                                <option value=""></option>

                                            </select>
                                            @error('selected_label')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 choose-artist" style="display: none">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="selected_artist" class="label_style"><b
                                                class="@error('selected_artist') text-danger @enderror">Artists</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <select class="custom-select  @error('selected_account') is-invalid @enderror"
                                                name="selected_artist" id="selected_artist">
                                                <option value=""></option>

                                            </select>
                                            @error('selected_artist')
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
                                        <label for="subject" class="label_style"><b
                                                class="@error('subject') text-danger @enderror">Subject
                                            </b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                                name="subject" id="subject" placeholder="Subject"
                                                value="{{ old('subject') }}" />
                                            @error('subject')
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
                                    <div class="col-sm-3 pl-4 d-flex align-items-center">
                                        <label for="" class="label_style"><b
                                                class="@error('logo') text-danger @enderror">Select Logo
                                            </b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group mb-0">
                                            <input type="radio" name="logo" value="logo.png" />
                                            <img src="{{ asset('assets/img/logo.png') }}" alt="" style="max-width:100px">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="radio" name="logo" value="logo-2.png" />
                                            <img src="{{ asset('assets/img/logo-2.png') }}" alt=""
                                                style="max-width:100px;">
                                        </div>
                                        <div class="form-group">
                                            @error('logo')
                                                <div class="text-danger">
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
                                        <label for="image" class="label_style"><b
                                                class="@error('image') text-danger @enderror">Image
                                            </b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                name="image" id="image" placeholder="image" value="{{ old('image') }}" />
                                            @error('image')
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
                                        <label for="choose_template" class="label_style"><b
                                                class="@error('choose_template') text-danger @enderror">Choose
                                                Template</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <img src="{{ asset('assets/images/template-1.png') }}"
                                                        alt="template Img" data-template="template-1"
                                                        class="img-fluid choose_template_img pointer @error('choose_template') border border-danger @enderror">
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <img src="{{ asset('assets/images/template-2.png') }}"
                                                        alt="template Img" data-template="template-2"
                                                        class="img-fluid choose_template_img pointer @error('choose_template') border border-danger @enderror">
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <img src="{{ asset('assets/images/template-3.png') }}"
                                                        alt="template Img" data-template="template-3"
                                                        class="img-fluid choose_template_img pointer @error('choose_template') border border-danger @enderror">
                                                </div>
                                            </div>
                                            <input
                                                class="custom-select choose_template d-none @error('choose_template') is-invalid @enderror"
                                                name="choose_template" id="choose_template" />
                                            @error('choose_template')
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
                                        <label for="url" class="label_style"><b
                                                class="@error('url') text-danger @enderror">Button URL
                                            </b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('url') is-invalid @enderror"
                                                name="url" id="url" placeholder="https://www.example.com"
                                                value="{{ old('url') }}" />
                                            @error('url')
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
                                        <label for="inputContent" class="label_style"><b
                                                class="@error('message') text-danger @enderror">Message</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <textarea rows="10"
                                                class="form-control rounded @error('message') is-invalid @enderror"
                                                name="message" id="inputContent">{{ old('message') }}</textarea>
                                            @error('message')
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
                            <input type="submit" value="Send"
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
        jQuery(document).ready(function() {
            $('.choose_template_img').click(function() {
                $('.choose_template_img').removeClass('border border-success border-danger');
                $(this).addClass('border border-success');
                var src = $(this).data('template');
                // alert(src);
                $('#choose_template').val(src);

            });
        });
        CKEDITOR.replace('inputContent', {

        });
        $('#selected_account').change(function() {
            // alert();
            var account_id = $(this).val();
            if (account_id == "") {
                $('.choose-artist').slideUp().promise().done(function() {
                    $('.choose-label').slideUp();
                });
                return false;
            }
            $.ajax({
                url: "{{ route('get_labels') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    account_id: account_id
                },
                success: function(data) {
                    $('.choose-label').slideDown();
                    $('#selected_label').html(data);
                },
                error: function() {
                    console.log('something went wrong on server when fetching labels');
                },
            });
        });
        $('#selected_label').change(function() {
            var label_id = $(this).val();
            if (label_id == "") {
                $('.choose-artist').slideUp();
                return false;
            }
            $.ajax({
                url: "{{ route('get_artists') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    label_id: label_id
                },
                success: function(data) {
                    $('.choose-artist').slideDown();
                    $('#selected_artist').html(data);
                },
                error: function() {
                    console.log('something went wrong on server when fetching labels');
                },
            });
        });

    </script>
@endpush
