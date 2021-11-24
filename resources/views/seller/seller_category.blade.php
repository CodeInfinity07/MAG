@extends('seller.layout.index')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('add.category')}}" method="get">
        @csrf
          
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Parent Category: </label>
          </div>
          <select name="parentCategoryName" class="custom-select" id="inputGroupSelect01">
            <option selected disabled>--Select--</option>
            @foreach ($data as $item)
          <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
            {{-- <option value="One">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option> --}}
          </select>
        </div>

          <div class="form-group">
            <label for="categoryName" id="categoryName" class="col-form-label">Category:</label>
            <input type="text" class="form-control @error('categoryName') is-invalid @enderror" value="{{ old('categoryName') }}" id="categoryName" name="categoryName" required autocomplete="categoryName" autofocus>
            @error('categoryName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description:(optional) </label>
            <textarea class="form-control" name="categoryDescription"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <input type="submit" class="btn btn-primary" value="Submit"></a>
    </form>
      </div>
    </div>
  </div>
</div>

@section('content')
    <div class="row" >
        <div class="container col-md-12 mt-4">
        <div class="card">
            <div class="card-header">
            <h4 class=""><i class="fa fa-bars">&nbsp;Categories</i></h4>
            <div class="d-flex flex-row-reverse"><a href="#"><input data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-info" value="Add New"></a></div>
        </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">

                    <table class="table table-hover">
                        <thead>
                          <tr >
                            <th style="width: 10%" scope="col">ID</th>
                            <th style="width: 20%" scope="col">Name</th>
                            <th style="width: 20%" scope="col">Parent ID</th>

                            {{-- <th style="width: 50%" scope="col">Description</th> --}}
                            <th style="width: 10%" scope="col">Date</th>
                            <th style="width: 10%" scope="col">Status</th>
                            <th style="width: 10%"scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(count($all)==0)
                          <td>No Data to show</td>
                          @else
                          @foreach ($all as $item)
                          <tr class="">
                          <th scope="row">{{$item->id }}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->parent_id }}</td>
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
                                      <a class="dropdown-item" href="/seller/delete-category/{{$item->id}}">Delete</a>
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






                    {{-- Request Model --}}
                    {{-- <form action="/">
                        <div class="row">       
                            <h5>Subject:</h5>
                            <input type="text" class="form-control">
                        </div><br>
                        <div class="row">       
                            <h5>Description:</h5>
                            <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div><br>
                        <input type="submit" class="btn btn-success"> 
                    </form> --}}
                    
                </p>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('yield')
<script>
  if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
</script>
@endsection