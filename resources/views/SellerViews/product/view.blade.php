@extends('SellerViews.layouts.index')

@section('style')
<style>
    .show-read-more .more-text{
        display: none;
    }
</style>
@endsection

@section('links')
    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
@endsection

@section('content')
<div class="container-fluid">
    {{-- filters --}}
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-lg-2">
                <label for="" class="form-control-input">Sort by</label>
                <select name="sortBy" id="" class="form-control">
                    <option value="" selected>Choose</option>

                    <option value="id">id</option>
                    <option value="price">Price</option>
                    <option value="stock">Stock</option>
                    <option value="stock">Views</option>

                </select>
            </div>
            <div class="col-lg-2">
                <label for="" class="form-control-input">Sort by Category</label>
                <select name="sortBy" id="" class="form-control">
                    <option value="" selected>Choose</option>
                    
                    <option value="id">id</option>

                    <option value="price">Price</option>
                    <option value="stock">Stock</option>
                </select>
            </div>
            <div class="col-lg-2">
                <label for="" class="form-control-input">Sort by Brand</label>
                <select name="sortBy" id="" class="form-control">
                    <option value="" selected>Choose</option>
                    <option value="id">id</option>
                    <option value="price">Price</option>
                    <option value="stock">Stock</option>
                </select>
            </div>
            <div class="col-lg-2">
                <label for="" class="form-control-input">Sort by Color</label>
                <select name="sortBy" id="" class="form-control">
                    <option value="" selected>Choose</option>

                    <option value="id">id</option>
                    <option value="price">Price</option>
                    <option value="stock">Stock</option>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="" class="form-control-input" >Search</label>
                <input type="text" class="form-control" placeholder="Search..."> 
            </div>
            <div class="col-lg-1 mt-4 pl-1 pt-2">
                <input type="Submit" value="Filter" class="btn btn-info">
            </div>
        </div>
    </div>
</div>

{{-- Products --}}
@foreach ($products as $product)
<div class="row mt-4">
    <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title">{{$product->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->created_at)->format('Y-m-d') }}</h6>
            </div>
            <img class="img-fluid" src="{{asset('assets/SellerPublic')}}/images/big/img1.jpg" alt="">
            <div class="card-body">
                <p class="card-text show-read-more">{!!$product->description!!}</p>
            </div>
            <div class="card-footer">
                <p class="card-text d-inline"><small class="text-muted">Last updated 3 mins ago</small>
                <p class="card-text d-inline"><small class="text-muted">Stock ::{{$product->stock}}</small>
                </p><a href="#" class="card-link float-right"><small>{{$product->price}}</small></a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-6">
       
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Statistics</h4>
                    <ul class="nav nav-pills mb-3 justify-content-end">
                        <li class="nav-item"><a href="#navpills2-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Meetings</a>
                        </li>
                        <li class="nav-item"><a href="#navpills2-2" class="nav-link" data-toggle="tab" aria-expanded="false">Reviews</a>
                        </li>
                        <li class="nav-item"><a href="#navpills2-3" class="nav-link" data-toggle="tab" aria-expanded="true">Comments</a>
                        </li>
                    </ul>
                    <div class="tab-content br-n pn">
                        <div id="navpills2-1" class="tab-pane active">
                            <div class="row align-items-center text-left">
                                <div class="col-sm-6 col-md-12 col-xl-12">
                                            <div class="table-responsive">
                                                <table class="table header-border">
                                                    <thead>
                                                        <tr>
                                                            <th>Meeting No #</th>
                                                            <th>User</th>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="javascript:void(0)">Order #26589</a>
                                                            </td>
                                                            <td>Herman Beck</td>
                                                            <td><span class="text-muted">Oct 16, 2017</span>
                                                            </td>
                                                            <td>$45.00</td>
                                                            <td><span class="label gradient-1 rounded">Paid</span>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0)">Order #58746</a>
                                                            </td>
                                                            <td>Mary Adams</td>
                                                            <td><span class="text-muted">Oct 12, 2017</span>
                                                            </td>
                                                            <td>$245.30</td>
                                                            <td><span class="label gradient-2 rounded">Shipped</span>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:void(0)">Order #98458</a>
                                                            </td>
                                                            <td>Caleb Richards</td>
                                                            <td><span class="text-muted">May 18, 2017</span>
                                                            </td>
                                                            <td>$38.00</td>
                                                            <td><span class="label gradient-4 rounded">Shipped</span>
                                                            </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div id="navpills2-2" class="tab-pane">
                            <div class="row align-items-center text-left">
                                <div class="col-sm-6 col-md-12 col-xl-12">
                                    <div class="table-responsive">
                                        <table class="table header-border">
                                            <thead>
                                                <tr>
                                                    <th>Review</th>
                                                    <th>User</th>
                                                    <th>Comment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a></td>
                                                    <td>Herman Beck</td>
                                                    <td><span class="text-muted">Oct 16, 2017</span>
                                                    </td>
                                                    
                                                    
                                                    
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)">Order #58746</a>
                                                    </td>
                                                    <td>Mary Adams</td>
                                                    <td><span class="text-muted">Oct 12, 2017</span>
                                                    </td>
                                                   
                                                    
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)">Order #98458</a>
                                                    </td>
                                                    <td>Caleb Richards</td>
                                                    <td><span class="text-muted">May 18, 2017</span>Comment</td>
                                                    
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="navpills2-3" class="tab-pane">
                            <div class="row align-items-center text-left">
                                <div class="col-sm-6 col-md-12 col-xl-12">
                                    <div class="table-responsive">
                                        <table class="table header-border">
                                            <thead>
                                                <tr>
                                                    <th>Meeting No #</th>
                                                    <th>User</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="javascript:void(0)">Order #26589</a>
                                                    </td>
                                                    <td>Herman Beck</td>
                                                    <td><span class="text-muted">Oct 16, 2017</span>
                                                    </td>
                                                    <td>$45.00</td>
                                                    <td><span class="label gradient-1 rounded">Paid</span>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)">Order #58746</a>
                                                    </td>
                                                    <td>Mary Adams</td>
                                                    <td><span class="text-muted">Oct 12, 2017</span>
                                                    </td>
                                                    <td>$245.30</td>
                                                    <td><span class="label gradient-2 rounded">Shipped</span>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)">Order #98458</a>
                                                    </td>
                                                    <td>Caleb Richards</td>
                                                    <td><span class="text-muted">May 18, 2017</span>
                                                    </td>
                                                    <td>$38.00</td>
                                                    <td><span class="label gradient-4 rounded">Shipped</span>
                                                    </td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
    {{-- CRUD Buttos --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="button-icon" style="margin-left:-30px; ">
                            <div class="row mr-2" style="display:flex; justify-content: space-around">
                            <button type="button" class="btn mb-1 btn-primary ">Edit <span class="btn-icon-right" style="width:20px; "><i class="fa fa-edit"></i></span>
                            </button>
                            <button type="button" class="btn mb-1 btn-info">Show<span class="btn-icon-right" style="width:20px;"><i class="fa fa-eye"></i></span>
                            </button>
                            <button type="button" class="btn mb-1 btn-danger">Delete <span class="btn-icon-right" style="width:20px;"><i class="fa fa-close"></i></span>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            </div>
            <img class="img-fluid" src="{{asset('assets/SellerPublic')}}/images/big/img1.jpg" alt="">
            <div class="card-body">
                <p class="card-text">This is a wider card with supporting text and below as a natural lead-in to the additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <p class="card-text d-inline"><small class="text-muted">Last updated 3 mins ago</small>
                </p><a href="#" class="card-link float-right"><small>Card link</small></a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            </div>
            <img class="img-fluid" src="{{asset('assets/SellerPublic')}}/images/big/img1.jpg" alt="">
            <div class="card-body">
                <p class="card-text">This is a wider card with supporting text and below as a natural lead-in to the additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <p class="card-text d-inline"><small class="text-muted">Last updated 3 mins ago</small>
                </p><a href="#" class="card-link float-right"><small>Card link</small></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        var maxLength = 30;
        $(".show-read-more").each(function(){
            var myStr = $(this).text();
            if($.trim(myStr).length > maxLength){
                var newStr = myStr.substring(0, maxLength);
                var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                $(this).empty().html(newStr);
                $(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
                $(this).append('<span class="more-text">' + removedStr + '</span>');
            }
        });
        $(".read-more").click(function(){
            $(this).siblings(".more-text").contents().unwrap();
            $(this).remove();
        });
    });
    </script>
@endsection