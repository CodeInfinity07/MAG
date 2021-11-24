@extends('SellerViews.layouts.index')

@section('links')
    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Gallery</a></li>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Gallery</h4>
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">View Gallery</a>
                    </li>
                    <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Add New Image</a>
                    </li>
                </ul>
                <div class="tab-content br-n pn">
                    <div id="navpills-1" class="tab-pane active">
                        <div class="row align-items-center mb-4s">
                            @foreach ($data as $item)
                                
                           
                            <div class="col-sm-6 col-md-3 col-xl-3 mt-4">
                                <div class="">
                                <img src="{{asset('assets/SellerImages/gallery/').$item->image}}" alt="" style="width:200px; height:auto;" class="img-fluid thumbnail m-r-15">
                                    <span style="display:flex; justify-content:center">{{$item->name}}</span>
                                    <div class="col-md-12">
                                        <div class="container d-flex justify-item-center" style="background-color:lightgray; width:100%;">
                                            <a href="{{route('seller.gallery.removeImage',$item->id)}}"><input type="button" class="btn btn-danger ml-3" value="Delete" style="width: 100%;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                           
                            
                            
                        </div>

                        
                    </div>
                    <div id="navpills-2" class="tab-pane">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-md-4 col-xl-2">
                                <img src="images/big/card-3.png" alt="" class="img-fluid thumbnail m-r-15">
                            </div>
                            <div class="col-sm-6 col-md-8 col-xl-10">
                                <div class="col-md-6 mb-4">
                                    <form action="{{route('seller.gallery.addImage')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-auto">
                                            <label class="form-group">Upload Image</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Image</div>
                                                </div>
                                                <input type="file" name="image" class="form-control" placeholder="Image" required>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="">Name</label>
                                            <input type="text" name="image_name" class="form-control mb-2" placeholder="Image Name" required>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group-prepend"><span class="input-group-text">Description</span>
                                            </div>
                                            <textarea name="image_description" class="form-control"></textarea>
                                        </div>
                                        <input class="btn btn-info mt-4 ml-3"  type="Submit" value="Submit">
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection