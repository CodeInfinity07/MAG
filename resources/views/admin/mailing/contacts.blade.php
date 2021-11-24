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
                                    <span class="contact ">LIFETIME EARNING</span>
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
                                    <span class="contact">YOUR BALANCE</span>
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
                        id="add-contact">Add
                        Contact</button>
                    <button
                        class="btn btn-dark rounded px-4 py-2 text-light border-0 ml-2 outline-none add-to-contact-list"><i
                            class="fa fa-plus border-5 border-white rounded mr-2"></i> Add to list
                    </button>
                </div>
                {{-- @if (!empty($accounts)) --}}
                <div id="contact-table" style=" @if ($errors->any()) display:none; @endif">
                    <table class="table table-hover contact-list-table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Add to List</th>
                            </tr>
                        </thead>
                        <tbody class="contacts-tbody">
                            @php $i = 1; @endphp

                            @csrf
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td scope="row">{{ $i }}</td>
                                    <td scope="row">
                                        @if ($contact->user->username != '')
                                        {{ $contact->user->username }} @else {{ '--- ' }}
                                        @endif
                                    </td>
                                    <td scope="row">
                                        @if ($contact->email != '')
                                        {{ $contact->email }} @else {{ '--- ' }}
                                        @endif
                                    </td>
                                    <td>
                                        <input type="checkbox" form="submit_checked_emails" name="list[]"
                                            class="contact-list-checkbox" value="{{ $contact->id }}">
                                    </td>
                                </tr>
                                @php $i++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal update_contact_list" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('add_contact_to_list') }}" class="submit_checked_emails"
                                    method="post" id="submit_checked_emails">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selected_list">Options</label>
                                        </div>
                                        <select class="custom-select  @error('selected_list') is-invalid @enderror"
                                            name="selected_list" id="selected_list">
                                            <option selected>Choose...</option>
                                            @foreach ($mailing_lists as $mailng_list)
                                                <option value="{{ $mailng_list->id }}">{{ $mailng_list->list_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('selected_list')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" form="submit_checked_emails" class="btn btn-success">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
                <div id="add-contact-form" class="shadow" style="@if ($errors->any()) display:block;
                @else display: none @endif">
                    <div class="form-heading theme-background text-white p-3 text-center mb-3">
                        <h1 class="display-4">Add Contact</h1>
                    </div>
                    <form action="{{ route('store_account') }}" method="POST" class="p-3" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="email_c" class="label_style"><b
                                                class="@error('email') text-danger @enderror">Email</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control rounded @error('email') is-invalid @enderror"
                                                name="email" id="email_c" value="{{ old('email') }}">
                                            @error('email')
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
                            <input type="submit" value="Create Contact"
                                class=" ml-3 theme-background outline-none px-4 py-2  text-white border-0">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /main-content-body -->
    </div>
    <!-- /container -->

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            //   contact section
            $(document).on('click', '#add-contact', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#accounts").removeClass('btn-success').addClass('btn-dark');
                $('#contact-table').fadeOut(1000).promise().done(function() {
                    $('#add-contact-form').fadeIn();
                });
            });
            $(document).on('click', '#accounts', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#add-contact").removeClass('btn-success').addClass('btn-dark');
                $('#add-contact-form').fadeOut(1000).promise().done(function() {
                    $('#contact-table').fadeIn();
                });
            });
            jQuery('.add-to-contact-list').click(function() {
                var checked = $('.contacts-tbody').find(':checked').length;
                if (!checked) {
                    alert('Please select at least One Contact');
                    return false;
                }
                $('.update_contact_list').fadeIn(1000);
            });
            $('.close').click(function() {
                $('.update_contact_list').fadeOut(1000);
            });
            $('.contact-list-table').DataTable();
        });

    </script>
@endpush
