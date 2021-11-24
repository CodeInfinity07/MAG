@extends('admin.includes.master')
@section('title', 'Groups')
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
                        id="groups">Groups</button>
                    <button class="btn btn-dark rounded px-4 py-2 text-light border-0 ml-2 outline-none" id="add-group">Add
                        Group</button>

                         <button
                        class="btn btn-dark rounded px-4 py-2 text-light border-0 ml-2 outline-none add-to-group-list"><i
                            class="fa fa-plus border-5 border-white rounded mr-2"></i> Add to Group
                    </button>
                </div>
                @if (!empty($groups))
                                    <div id="group-table" class="table-responsive" style=" @if ($errors->any()) display:none; @endif">
                        <table class="table table-hover group-list-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <!-- <th scope="col">Username</th> -->
                                    <th scope="col">Email</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Action</th>
                                    <th>Add to Group</th>
                                </tr>
                            </thead>
                            <tbody class="groups-tbody">
                                @php $i = 1; @endphp
                                @foreach ($groups as $group)
                                    <tr>
                                        <td scope="row">{{ $i }}</td>
                                        <td scope="row">
                                            @if ($group->name != '')
                                            {{ $group->name }} @else {{ '--- ' }} @endif
                                        </td>
                                        <td scope="row">
                                            @if ($group->email != '')
                                            {{ $group->email }} @else {{ '--- ' }} @endif
                                        </td>
                                        <td scope="row">
                                            @if ($group->country != '')
                                            {{ $group->country }} @else {{ '--- ' }} @endif
                                        </td>

                                      
                                       
                                        <td>
                                            
                                           <div class="d-flex align-items-center">
                                             <a href="{{ route('group.edit',$group->id) }}"
                                                class="btn btn-success m-1">Edit</a>

                                             <a href="{{ route('group.show', $group->id) }}"
                                                class="btn btn-success m-1">View Group</a>
                                            
                                            <form action="{{ route('group.destroy',$group->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger  px-4 py-2  text-white">
                       
                                            </form>
                                               
                                           </div>
                                        </td>

                                          <td>
                                            <input type="checkbox" form="submit_checked_emails" name="list[]"
                                            class="contact-list-checkbox" value="{{ $group->id }}">
                                        </td>


                                    </tr>
                                    @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif

                <!-- Modal -->

                <div class="modal update_group_list" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('add_group_to_list') }}" class="submit_checked_emails"
                                    method="post" id="submit_checked_emails">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selected_list">Options</label>
                                        </div>
                                        <select class="custom-select  @error('selected_list') is-invalid @enderror"
                                            name="selected_list" id="selected_list">
                                            <option selected>Choose...</option>
                                            @foreach ($users as $user)

                                                <option value="{{ $user->id }}">@if($user->name != '') {{ $user->name }} @else {{ '-----' }} @endif
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


                <div id="add-group-form" class="shadow" style=" @if ($errors->any()) display:block;
                @else display: none @endif">
                    <div class="form-heading theme-background text-white p-3 text-center mb-3">
                        <h1 class="display-4">Add Group</h1>
                    </div>
                    <form action="{{ route('group.store') }}" method="POST" class="p-3" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="row">
                                    <div class="col-sm-3 pl-4">
                                        <label for="group_name-f" class="group_style"><b
                                                class="@error('group_name') text-danger @enderror">Group Name</b></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control rounded @error('group_name') is-invalid @enderror"
                                                name="group_name" id="group_name-f" value="{{ old('group_name') }}">
                                            @error('group_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
        
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="reset" value="Reset"
                                class="theme-background outline-none px-4 py-2 text-white border-0">
                            <input type="submit" value="Create Group"
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
            $(document).on('click', '#add-group', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#groups").removeClass('btn-success').addClass('btn-dark');
                $('#group-table').fadeOut(1000).promise().done(function() {
                    $('#add-group-form').fadeIn();
                });

            });
            $(document).on('click', '#groups', function() {
                $(this).removeClass('btn-dark').addClass('btn-success');
                $("#add-group").removeClass('btn-success').addClass('btn-dark');
                $('#add-group-form').fadeOut(1000).promise().done(function() {
                    $('#group-table').fadeIn();
                });
            });

            jQuery('.add-to-group-list').click(function() {
                var checked = $('.groups-tbody').find(':checked').length;
                if (!checked) {
                    alert('Please select at least One Contact');
                    return false;
                }
                $('.update_group_list').fadeIn(1000);
            });
            $('.close').click(function() {
                $('.update_group_list').fadeOut(1000);
            });

            $('.group-list-table').DataTable();
        });

    </script>
@endpush
