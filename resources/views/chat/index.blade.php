 @extends('layouts.chat') 
 @section('content')


            <!-- Main Content -->


    <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>Let's Chat</h3>
                    </div>
                </div>





                <!--MESSAGERIE-->
                <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 my-3">
                                            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 order-sm-last">
                <div id="messages">
                </div>
                <div class="input-text" id="msgbox">
                    <input type="text" class="text" placeholder="Type your message here">
                </div>
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
                                    <div class="media-left">
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
@endsection


@push('scripts')


 

    <script type="text/javascript">
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
                    url: "message/" + receiver_id, // need to create this route
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#messages').html(data);
                        $('#msgbox').show();
                        scrollToBottomFunc();
                    }
                });
            });
            $(document).on('keyup', '.input-text input', function (e) {
                var message = $(this).val();
                // check if enter key is pressed and message is not null also receiver is selected
                if (e.keyCode == 13 && message != '' && receiver_id != '') {
                    $(this).val(''); // while pressed enter text box will be empty
                    var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                    $.ajax({
                        type: "post",
                        url: "message", // need to create this post route
                        data: datastr,
                        cache: false,
                        beforeSend: function() {
                            $('#msgloader').show();
                        },
                        success: function (data) {
                            $.ajax({
                                type: "get",
                                url: "message/" + receiver_id, // need to create this route
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
                    url: "messagecount/" + id, // need to create this route
                    data: "",
                    cache: false,
                    success: function (data) {
                        if(data.length > 0){
                            $.ajax({
                                type: "get",
                                url: "message/" + id, // need to create this route
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

