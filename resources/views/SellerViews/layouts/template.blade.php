@extends('SellerViews.layouts.index')

@section('links')
    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
@endsection

@section('content')
        <p>To make your dashboard sidebar fixed, please go to <code>gleek.js</code> file and make sure <code>sidebarPosition: "fixed"</code> </p>
        <pre>
            <code class="javascript">
                (function($) {
                    "use strict"

                    new quixSettings({
                        headerPosition: "fixed"
                    });
                    
                })(jQuery);
            </code>
        </pre>
@endsection