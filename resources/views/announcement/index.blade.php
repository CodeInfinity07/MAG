
 @extends('layouts.chat') 
 @section('content')




            <!-- Main Content -->
            <div class="layout-px-spacing">

                <div class="container-fluid" id="success-alert" style="display: none;">
                    <div class="row">
                        <div class="col">
                             <!-- Primary Alert -->
                            <div class="alert alert-primary alert-dismissible fade show">
                                <strong>Message!</strong> Message Sent Successfully
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                            
                        </div>                        
                    </div>   
                </div>
                <div class="container-fluid announcement">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                                <div class="page-title">
                                    <h3>Announcements</h3>
                                </div>
                        </div>
                        <div class="col-md-8 col-sm-12 btn-section">
                              <div class="d-flex justify-content-end">
                                @if(Auth::user()->get_role_name->role_name == 'Admin')
                                <div class="pr-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success group-btn" data-toggle="modal" data-target="#multiGroupsModal">
                                        Send Group
                                    </button>
                                </div>

                                <div class="">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success user-btn" data-toggle="modal" data-target="#multiUsersModal">
                                        Send Bulk Announcements
                                    </button>
                                </div>
                                @endif
                                
                            </div>
                        </div>

                        
                    </div>
                    
                </div>

   <!--              <div class="page-header flex-row">
                    <div class="page-title">
                        <h3>Announcements</h3>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        
                        @if(Auth::user()->get_role_name->role_name == 'Admin')
                        <div> -->
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#multiGroupsModal">
                                Send Group
                            </button>
                        </div>

                        <div> -->
                            <!-- Button trigger modal -->
                           <!--  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#multiUsersModal">
                                Send Bulk Announcements
                            </button>
                        </div>
                        @endif
                        
                    </div>
                </div> -->

                <!--MESSAGERIE-->
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 my-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 order-sm-last">
                            <div id="messages"></div>
                            @if(Auth::user()->get_role_name->role_name == 'Admin')
                                <div class="input-text" id="msgbox">
                                    <textarea type="text" class="text form-control" placeholder="Type your message here" rows="8"></textarea>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-4 order-sm-first">
                            <div class="user-wrapper">
                                <ul class="users">
                                @php 
                                $file_path = $app_path = storage_path('app/public/profiles');
                                @endphp
                                @foreach($users as $user)
                                    <li class="user px-2 d-flex justify-content-between" id="{{ $user->id }}" style="border-bottom:1px solid #d2d2d2;">
                                        <div class="media">
                                            <div class="media-left mr-2">
                                            @if (!empty($user->picture))
                                                <img src="{{ asset('storage/profiles/' . $user->picture) }}" alt="" class="media-object">
                                            @else 
                                                <img src="https://maptransport.com/fret/storage/app/public/uploads/boy.png" alt="" class="media-object">
                                            @endif
                                            </div>
                                            <div class="media-body">
                                                <!-- <p>{{ asset('storage/profiles/' . $user->picture) }}</p> -->
                                                <div class="d-flex" style="justify-content: space-between; align-items: center;">
                                                    <div class="">
                                                    @if (!empty($user->name))
                                                        <p class="name m-0" style="color:red;"> {{ $user->name }}</p>
                                                    @else 
                                                        <p class="name m-0" style="color:red;"> Test User </p>
                                                    @endif
                                                    @if (!empty($user->email)) 
                                                        <p class="email fs-11">{{$user->email}}</p>
                                                    @else
                                                        <p class="email fs-11">test-email@gmail.com</p>
                                                    @endif                                
                                                    </div>
                                                    @if($user->unread)
                                                    <div>
                                                        <span class="message-count">{{ $user->unread }}</span>
                                                    </div>
                                                    @endif
                                                </div>                                                                    
                                            </div>
                                        </div>
                                    </li>
                                @endforeach                                                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF USER PART -->
            </div>
            <!-- END Main Content -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="multiUsersModal" tabindex="-1" aria-labelledby="multiUsersModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="multiUsersModalLabel">Add To Multiple Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="bulk_announcements_form">
                        <div class="form-group">
                            <label>Select Users</label>
                            <select id="usersDropDown" name="name[]" multiple class="form-control basic-multiple">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="form-check-input ml-0 user-list" type="checkbox" name="allusers" id="allusers">
                            <label class="form-check-label" for="allusers">
                                Send to all users
                            </label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input ml-0 user-list" type="checkbox" name="allpremium" id="allpremium">
                            <label class="form-check-label" for="allpremium">
                                Send to all premium accounts
                            </label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input ml-0 user-list" type="checkbox" name="allfree" id="allfree">
                            <label class="form-check-label" for="allfree">
                                Send to all free accounts
                            </label>
                        </div>

                        <div class="form-group">
                            <label for=""></label>
                            <textarea type="text" class="text form-control" name="message" id="message" placeholder="Type your message here" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" name="submit" value="SEND" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Multi Groups Modal -->
    <div class="modal fade" id="multiGroupsModal" tabindex="-1" aria-labelledby="multiGroupsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="multiGroupsModalLabel">Add To Multiple Groups</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="bulk_group_announcements_form">
                        <div class="form-group">
                            <label>Select Groups</label>
                            <select id="groupsDropDown" name="name" class="form-control basic-multiple-group pr-0 pb-0 pt-0">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <input class="form-check-input ml-0" type="checkbox" name="allgroups" id="allusers">
                            <label class="form-check-label" for="allgroups">
                                Send to all Groups
                            </label>
                        </div> -->
                        <div class="form-group">
                            <label for=""></label>
                            <textarea type="text" class="text form-control" name="message" id="group-message" placeholder="Type your message here" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" name="submit" value="SEND" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">

        // $(function() {
        //   $('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
        // });

        // send bulk announcements JS
        $(document).ready(function() {

            $('.basic-multiple').select2({
                width: '100%'
            });

            $('.user-list').on('change', function() {
                $('.user-list').not(this).prop('checked', false);  
            });


            // Group Announcement
            $('#bulk_group_announcements_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // alert(form_data);
                $.ajax({
                    url:"{{ route('storeMultiGroupAnnouncement') }}",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                     // console.log(data);
                         // alert(data['success']);
                        $('#groupsDropDown option:selected').each(function(){
                            $(this).prop('selected', false);
                        });
                        $('.basic-multiple-group').select2();
                        $("#allgroups").prop("checked", false);
                        $('#group-message').val('');
                        $("#multiGroupsModal").modal('hide');
                        $("#success-alert").show().delay(5000).queue(function(n) {
                          $(this).hide(); n();
                        });
                           
                    }
                });
            });

            $('#bulk_announcements_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url:"{{ route('storeMultiAnnouncement') }}",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        $('#usersDropDown option:selected').each(function(){
                            $(this).prop('selected', false);
                        });
                        $('.basic-multiple').select2();
                        $("#allusers").prop("checked", false);
                        $("#allfree").prop("checked", false);
                        $("#allpremium").prop("checked", false);
                        $('#message').val('');
                        $("#multiUsersModal").modal('hide');
                        $("#success-alert").show().delay(5000).queue(function(n) {
                          $(this).hide(); n();
                        });
                    }
                });
            });
        });

        // Sidebar JS
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <!-- chat JS -->
    <script type='text/javascript'>
        var receiver_id = '';
        var my_id = "{{ Auth::id() }}";
        $(document).ready(function () {
            setInterval(function(){
                update_chat_history_data();
            }, 10000);

            // ajax setup form csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
            var pusher = new Pusher('2d707f8896c4794264ae', {
                cluster: 'ap2',
                forceTLS: true
            });
            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function (data) {
                // alert(JSON.stringify(data));
                if (my_id == data.from) {
                    $('#' + data.to).click();
                } else if (my_id == data.to) {
                    if (receiver_id == data.from) {
                        // if receiver is selected, reload the selected user ...
                        $('#' + data.from).click();
                    } else {
                        // if receiver is not seleted, add notification for that user
                        var pending = parseInt($('#' + data.from).find('.pending').html());
                        if (pending) {
                            $('#' + data.from).find('.pending').html(pending + 1);
                        } else {
                            $('#' + data.from).append('<span class="pending">1</span>');
                        }
                    }
                }
            });
            $('.user').click(function () {
                $('.user').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();
                receiver_id = $(this).attr('id');
                $.ajax({
                    type: "get",
                    url: "announcement/" + receiver_id, // need to create this route
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#messages').html(data);
                        $('#msgbox').show();
                        scrollToBottomFunc();
                    }
                });
            });
            $(document).on('keyup', '.input-text textarea', function (e) {
                var message = $(this).val();
                // check if enter key is pressed and message is not null also receiver is selected
                if (e.keyCode == 13 && message != '' && receiver_id != '') {
                    $(this).val(''); // while pressed enter text box will be empty
                    var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                    $.ajax({
                        type: "post",
                        url: "announcement", // need to create this post route
                        data: datastr,
                        cache: false,
                        beforeSend: function() {
                            $('#msgloader').show();
                        },
                        success: function (data) {
                            $.ajax({
                                type: "get",
                                url: "announcement/" + receiver_id, // need to create this route
                                data: "",
                                cache: false,
                                success: function (data) {
                                    $('#messages').html(data);
                                    scrollToBottomFunc();
                                    $('#msgloader').hide();
                                }
                            });
                        },
                        error: function (jqXHR, status, err) {
                        },
                        complete: function () {
                            
                            scrollToBottomFunc();
                        }
                    })
                }
            });
            function update_chat_history_data(){
                var id = $('.users .active').attr('id');
                $.ajax({
                    type: "get",
                    url: "announcementcount/" + id, // need to create this route
                    data: "",
                    cache: false,
                    success: function (data) {
                        if(data.length > 0){
                            $.ajax({
                                type: "get",
                                url: "announcement/" + id, // need to create this route
                                data: "",
                                cache: false,
                                success: function (data) {
                                    $('#messages').html(data);
                                    scrollToBottomFunc();
                                }
                            });
                        }
                    },
                    error: function (jqXHR, status, err){
                    }
                });
            }
        });

        // make a function to scroll down auto
        function scrollToBottomFunc() {
            $('.message-wrapper').animate({
                scrollTop: $('.message-wrapper').get(0).scrollHeight
            }, 50);
        }
    </script>
@endpush