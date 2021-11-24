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
                <div class="mb-3 text-white">
                    <button class="btn btn-success rounded px-4 py-2 text-light border-0 outline-none"
                        id="accounts">Accounts</button>
                    <button class="btn btn-dark rounded px-4 py-2 text-light border-0 ml-2 outline-none"
                        id="add-mailing_list">Add
                        New List</button>
                </div>
                {{-- @if (!empty($accounts)) --}}
                <div id="mailing_list-table" style=" @if ($errors->any()) display:none; @endif">
                    <table class="table table-hover mailing_list-list-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>List Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($mailing_lists as $mailing_list)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        @if ($mailing_list->list_name != '')
                                        {{ $mailing_list->list_name }} @else {{ '--- ' }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('list_contacts', $mailing_list->id) }}"
                                            class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></a>
                                        <a href="{{ route('edit.list-name', $mailing_list->id) }}"
                                            class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ route('delete.list-name', $mailing_list->id) }}"
                                            class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- @endif --}}
                <div id="add-mailing_list-form" class="shadow" style="@if ($errors->any()) display:block;
                @else display: none @endif">
                    <div class="form-heading theme-background text-white p-3 text-center mb-3">
                        <h1 class="display-4">Add New List</h1>
                    </div>
                    <form action="{{ route('store_mailing_list') }}" method="POST" class="p-3"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="list_name" class="label_style"><b
                                                class="@error('list_name') text-danger @enderror">List Name</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="name"
                                                class="form-control rounded @error('list_name') is-invalid @enderror"
                                                name="list_name" id="list_name" value="{{ old('list_name') }}">
                                            @error('list_name')
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
                            <input type="submit" value="Create List"
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
            //   mailing_list section 
            $(document).on('click', '#add-mailing_list', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#accounts").removeClass('btn-success').addClass('btn-dark');
                $('#mailing_list-table').fadeOut(1000).promise().done(function() {
                    $('#add-mailing_list-form').fadeIn();
                });
            });
            $(document).on('click', '#accounts', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#add-mailing_list").removeClass('btn-success').addClass('btn-dark');
                $('#add-mailing_list-form').fadeOut(1000).promise().done(function() {
                    $('#mailing_list-table').fadeIn();
                });
            });
            $('.mailing_list-list-table').DataTable();
        });

    </script>
@endpush
