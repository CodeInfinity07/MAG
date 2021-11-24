@extends('admin.includes.master-new')
@section('title', 'Dashboard')
@section('content')
    <div class="main-content">
        @include('admin/includes/header-new')
        <div class="home-section-four pt-5 my-5">
            <div class="m-md-4">
                <div class="card bg-light" style="border-radius: 10px !important;">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-center align-items-center fw-bolder">
                          <form action="/releaseForm" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">UPC</label>
                              <input type="email" class="form-control" name="upc" aria-describedby="emailHelp" disabled placeholder="Enter UPC">
                              <small id="emailHelp" class="form-text text-muted">You can leave it blank and we will generate one for you.</small>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Release Name</label>
                              <input type="text" class="form-control" name="releaseName" placeholder="Enter Name">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
