<div class="message-wrapper">
    <ul class="messages">
		@foreach($messages as $message)
        <li class="message clearfix">
			{{--if message from id is equal to auth id then it is sent by logged in user--}}
            <div class="{{ ($message->user_from == Auth::id()) ? 'sent' : 'received' }}">
                <p>{{ $message->message }}</p>
                <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
            </div>
        </li>
		@endforeach
    </ul>

    <div class="text-center" id="msgloader">
        <img src='assets/images/loading.gif'>
    <p>Sending...</p>
    </div>
</div>