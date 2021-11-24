@extends('SellerViews.layouts.index')

@section('links')
    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
@endsection

@section('content')


  
        <div class="card-body">
            <h4 class="card-title">Categories</h4>
            <ul class="nav nav-pills mb-3 justify-content-end">
                <li class="nav-item"><a href="#navpills2-1" class="nav-link active" data-toggle="tab" aria-expanded="false">All Categories</a>
                </li>
                <li class="nav-item"><a href="#navpills2-2" class="nav-link" data-toggle="tab" aria-expanded="false">Your Added Categories</a>
                </li>
                <li class="nav-item"><a href="#navpills2-3" class="nav-link" data-toggle="tab" aria-expanded="true"></a>
                </li>
            </ul>
            <div class="tab-content br-n pn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Custom select</h4>
                            <div class="basic-form">
                                <form action="{{route('seller.category.addCategory')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="parent">
                                    </div>
                                    {{-- <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="description">
                                    </div> --}}
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="Submit" value="Submit"  class="form-control" name="description">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
@endsection