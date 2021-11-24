@extends('seller.layout.index')
@include('seller.models.brand')


@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Add Brand</h4>
  </div>
  <div class="col-md-7 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Add Brand</li>
          </ol>
         
      </div>
  </div>
</div>

     
    <div class="row" >
        <div class="container col-md-12 mt-4">
          @if(session()->has('confirmation'))
           <div class="alert alert-sucess">
          {{session('confirmation')}}
      </div>
      @elseif(session()->has('confirmation-danger'))
      <div class="alert alert-danger">
        {{session('confirmation-danger')}}
    </div>
      @endif
        <div class="card">
            <div class="card-header">
            <h4 class=""><i class="fa fa-bars">&nbsp;Brands</i></h4>
            <div class="d-flex flex-row-reverse"><a href="#"><input data-toggle="modal" data-target="#brandModal" type="button" class="btn btn-info" value="Add New"></a></div>
        </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">

                    <table class="table table-hover">
                        <thead>
                          <tr >
                            <th style="width: 10%" scope="col">ID</th>
                            <th style="width: 20%" scope="col">Name</th>

                            {{-- <th style="width: 50%" scope="col">Description</th> --}}
                            <th style="width: 10%" scope="col">Date</th>
                            <th style="width: 10%" scope="col">Status</th>
                            <th style="width: 10%"scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(count($data)==0)
                          <td>No Data to show</td>
                          @else
                          @foreach ($data as $item)
                          <tr class="">
                          <th scope="row">{{$item->id }}</th>
                            <td>{{$item->name}}</td>
                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                            @if($item->status==1)
                            <td><span class="label label-info">Active</span></td>
                            
                            @else
                              <td><span class="label label-danger">Pending</span></td>
                            
                            @endif
                            <td>
                              @if($item->add_by_seller == Auth::user()->id)
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="/seller/delete-brand/{{$item->id}}">Delete</a>
                                      {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                                    </div>
                                  </div>
                                @else
                                  
                                
                                @endif
                            </td>
                          </tr>
                          @endforeach
                          @endif
                          
                         
                        </tbody>
                      </table>






                  
                    
                </p>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('yield')
<script>
  
</script>
@endsection