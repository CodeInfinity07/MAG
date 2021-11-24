@extends('layouts.seller')

@section('content')
<div class="container">
   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>{{ __('Thank you For registering with Us ') }}</h5></div>
            
                <div class="card-body">
                    {{-- Dear {{$user->seller_name}}: --}}
                   <label style="font-size: 20px"> Dear <strong> {{$user->seller_name}}:</strong> <br><br>
                    Thank you for registering with us. Your request has been submited
                    Successfully. And after confirmation with will send your login details
                   over <br><br> Email :: <strong>{{$user->seller_email}}</strong><br><br>
                    In case of any query Please contact us At <br>
                    <strong>ebazarSupport@gmail.com</strong><br>

                   
                    
                </label>
                <i>the verification normally take 24-48 hours</i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection