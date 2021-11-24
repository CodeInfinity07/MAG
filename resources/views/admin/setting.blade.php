@extends('admin.includes.master-new')
@section('title', 'Dashboard')
@section('stylesheet')
<link rel="stylesheet" href="{{asset('assets/css/store.css')}}" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('myScripts')
<script src="{{asset('assets/js/store-page.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script type="text/javascript">
     $("#settingsForm").on('submit',(function(e) { /*On Submit Of Form Named Mail Applicant */

         e.preventDefault();
         var myData = new FormData(this);
         const storesArray = [];
         $('.select-store__store--selected').each(function(){
            storesArray.push($(this).attr('id'));
         });
         var storenames = storesArray.join();
         myData.append('stores', storenames);
         console.log($(this).attr('action'));
         $.ajax({
             url: $(this).attr('action'), /*Posting The Data*/
             type: "POST",
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             data:  myData, // Pass your myData here.
             contentType: false,
             cache: false,
             processData:false,
             success: function(data)
             {
               console.log(data);
               window.location.href = '/user-settings';
             },
             error: function(data)
             {
               console.log(data);
             }
          });
       }));


</script>
@endsection
@section('content')
<div class="main-content" style="background-color: #f8f7ff">
   @include('admin/includes/header-new')
   @if(isset($ids))
   <form action="/multiple-users-settings" method="POST" id="settingsForm">
     @csrf
      <div class="home-section-four pt-5">
         <div class="m-md-4">
            <div class="manage-store-containner">
               <div class="card"
                  style="border-radius: 10px !important; width: 100%; margin: 1em 0 2em 0; background-color: white; box-shadow: none">
                  <div class="card-body d-flex justify-content-between align-items-center">
                     <div class="d-flex justify-content-center align-items-center fw-bolder">
                        <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Manage Store Settings</div>
                     </div>
                     <button type="button" class="btn" data-toggle="tooltip" data-placement="top"
                        title="Tooltip on top">
                        <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                           style="width: 30px;height: 30px"><i class="fa fa-question text-white"></i></div>
                     </button>
                  </div>
               </div>
               <div class="select-store">
                  <div class="select-store__controls">
                     <div class="select-store__search-containner">
                        <i class="fal fa-search"></i>
                        <input type="text" placeholder="Search">
                     </div>
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Select All</label>
                     </div>
                  </div>
                  <div class="select-store__stores-containner">
                    @foreach($stores as $store)
                     <div class="select-store__store" id="{{$store->store_id}}">
                        <div class="store-index">✓</div>
                        <div class="img-containner">
                           <img src="{{asset('assets/img/stores')}}/{{$store->store_id}}.jpg" alt="{{$store->store_name}} Logo">
                        </div>
                        <div class="store-name">
                           {{$store->store_name}}
                        </div>
                     </div>
                    @endforeach
                  </div>
               </div>
               <div class="col-md-12 col-lg-12 my-3">
                  <div class="form-group focused">
                     <label class="form-control-label" for=""> Record Label <span
                        class="text-danger">*</span></label>
                     <input type="text" name="record_label"
                        class="form-control @error('album') is-invalid @enderror"
                        placeholder="Enter Record Label" value="" required="">
                  </div>
               </div>
               <div class="col-md-12 col-lg-12 my-3">
                  <div class="form-group focused">
                     <label class="form-control-label" for="">Composition copyright © <span
                        class="text-danger">*</span></label>
                     <div class="row">
                        <div class="col-lg-3">
                           <input type="year" name="c_year"
                              class="form-control @error('c_year') is-invalid @enderror px-4"
                              value="2021"
                              required>
                        </div>
                        <div class="col-lg-9">
                           <input type="text" name="c_license"
                              class="form-control @error('c_license') is-invalid @enderror px-4"
                              placeholder="Under exclusive license to maDigital"
                              value="Under exclusive license to MaDigital" required>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-lg-12 my-3">
                  <div class="form-group focused">
                     <label class="form-control-label" for="">Sound Recording Copyright © <span
                        class="text-danger">*</span></label>
                     <div class="row">
                        <div class="col-lg-3">
                           <input type="year" name="r_year"
                              class="form-control @error('r_year') is-invalid @enderror px-4"
                              value="2021"
                              required>
                        </div>
                        <div class="col-lg-9">
                           <input type="text" name="r_license"
                              class="form-control @error('r_license') is-invalid @enderror px-4"
                              placeholder="Under exclusive license to maDigital"
                              value="Under exclusive license to MaDigital" required>
                        </div>
                     </div>
                  </div>
               </div>
               <input type="text" name="id_users" style="display: none;" value="{{$ids}}">
               <div class="card mt-5 save-banner" style="border-radius: 10px !important; width: 100%">
                  <div class="card-body d-flex justify-content-between align-items-center text-center">
                     <div class="col-md-4 d-flex justify-content-center">
                        <a href="" class="d-flex justify-content-center align-items-center"
                           style="font-size: 1.625em;color: rgba(68,68,68,0.98);border-radius: 50% ;border: 2px #3858f9 solid;width:3.125em;height: 3.125em">
                        <i class="fa fa-chevron-left text-primary "></i>
                        </a>
                     </div>
                     <div class="col-md-6">
                        <button class="btn btn-primary btn-lg  py-3 col-md-4" type="submit"
                           style="font-size:1.25em;border-radius: 15px">Save</button>
                     </div>
                  </div>
               </div>
   </form>
   @else
   <form action="/add-settings/{{$user_id}}" method="POST" id="settingsForm">
      <div class="home-section-four pt-5">
         <div class="m-md-4">
            <div class="manage-store-containner">
               <div class="card"
                  style="border-radius: 10px !important; width: 100%; margin: 1em 0 2em 0; background-color: white; box-shadow: none">
                  <div class="card-body d-flex justify-content-between align-items-center">
                     <div class="d-flex justify-content-center align-items-center fw-bolder">
                        <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Manage Store Settings</div>
                     </div>
                     <button type="button" class="btn" data-toggle="tooltip" data-placement="top"
                        title="Tooltip on top">
                        <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                           style="width: 30px;height: 30px"><i class="fa fa-question text-white"></i></div>
                     </button>
                  </div>
               </div>
               <div class="select-store">
                  <div class="select-store__controls">
                     <div class="select-store__search-containner">
                        <i class="fal fa-search"></i>
                        <input type="text" placeholder="Search">
                     </div>
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Select All</label>
                     </div>
                  </div>
                  <div class="select-store__stores-containner">
                    @foreach($stores as $store)
                     <div class="select-store__store" id="{{$store->store_id}}">
                        <div class="store-index">✓</div>
                        <div class="img-containner">
                           <img src="{{asset('assets/img/stores')}}/{{$store->store_id}}.jpg" alt="{{$store->store_name}} Logo">
                        </div>
                        <div class="store-name">
                           {{$store->store_name}}
                        </div>
                     </div>
                    @endforeach
                  </div>
               </div>
               <div class="col-md-12 col-lg-12 my-3">
                  <div class="form-group focused">
                     <label class="form-control-label" for=""> Record Label <span
                        class="text-danger">*</span></label>
                     <input type="text" name="record_label"
                        class="form-control @error('album') is-invalid @enderror"
                        placeholder="Enter Record Label" value="" required="">
                  </div>
               </div>
               <div class="col-md-12 col-lg-12 my-3">
                  <div class="form-group focused">
                     <label class="form-control-label" for="">Composition copyright © <span
                        class="text-danger">*</span></label>
                     <div class="row">
                        <div class="col-lg-3">
                           <input type="year" name="c_year"
                              class="form-control @error('c_year') is-invalid @enderror px-4"
                              value="2021"
                              required>
                        </div>
                        <div class="col-lg-9">
                           <input type="text" name="c_license"
                              class="form-control @error('c_license') is-invalid @enderror px-4"
                              placeholder="Under exclusive license to maDigital"
                              value="Under exclusive license to MaDigital" required>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-lg-12 my-3">
                  <div class="form-group focused">
                     <label class="form-control-label" for="">Sound Recording Copyright © <span
                        class="text-danger">*</span></label>
                     <div class="row">
                        <div class="col-lg-3">
                           <input type="year" name="r_year"
                              class="form-control @error('r_year') is-invalid @enderror px-4"
                              value="2021"
                              required>
                        </div>
                        <div class="col-lg-9">
                           <input type="text" name="r_license"
                              class="form-control @error('r_license') is-invalid @enderror px-4"
                              placeholder="Under exclusive license to maDigital"
                              value="Under exclusive license to MaDigital" required>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card mt-5 save-banner" style="border-radius: 10px !important; width: 100%">
                  <div class="card-body d-flex justify-content-between align-items-center text-center">
                     <div class="col-md-4 d-flex justify-content-center">
                        <a href="" class="d-flex justify-content-center align-items-center"
                           style="font-size: 1.625em;color: rgba(68,68,68,0.98);border-radius: 50% ;border: 2px #3858f9 solid;width:3.125em;height: 3.125em">
                        <i class="fa fa-chevron-left text-primary "></i>
                        </a>
                     </div>
                     <div class="col-md-6">
                        <button class="btn btn-primary btn-lg  py-3 col-md-4" type="submit"
                           style="font-size:1.25em;border-radius: 15px">Save</button>
                     </div>
                  </div>
               </div>
   </form>
   @endif
   </div>
   </div>
   </div>
</div>
@endsection
