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
   var path = "{{ route('autocomplete') }}";
   $('#redten').typeahead({
       source:  function (query, process) {
       return $.get(path, { term: query }, function (data) {
               return process(data);
           });
       }
   });

   $('input').on('change', function() {
       var currentClass = $(this).attr('class').split(' ');
       if ($(this).prop('checked')) {
         $('.' + currentClass[1]).prop('checked', true);
       } else {
         $('.' + currentClass[1]).prop('checked', false);
       }
     });

   $("#storeInfo").on('submit',(function(e) { /*On Submit Of Form Named Mail Applicant */

   e.preventDefault();
   var myData = new FormData(this);
   myData.append('stores', $('#selected-store__selected-stores').text());
   $.ajax({
       url: "/store/{{$album->id}}", /*Posting The Data*/
       type: "POST",
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       data:  myData, // Pass your myData here.
       contentType: false,
       cache: false,
       processData:false,
       success: function(data)
       {
         console.log(data);
         window.location = "/album/{{$album->id}}";
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
   <form action="store/{{$album->id}}" method="POST" id="storeInfo">
      <div class="home-section-four pt-5">
         <div class="m-md-4">
            <div class="manage-store-containner">
               <div class="card"
                  style="border-radius: 10px !important; width: 100%; margin: 1em 0 2em 0; background-color: white; box-shadow: none">
                  <div class="card-body d-flex justify-content-between align-items-center">
                     <div class="d-flex justify-content-center align-items-center fw-bolder">
                        <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Manage Store</div>
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
                  <div class="select-store__agreement">
                     <div class="select-store__agreemnts">
                        <p>Import information! By selecting youtube you agree to following:</p>
                        <p>Your audio is valid for content id: contains no samples, crreative commons or public
                           domain audio,<br /> is not a karaoke or sound-a-like, is not meditation music.
                        </p>
                        <p>YouTube Your audio has not been distributed to YouTube by any other party.</p>
                     </div>
                  </div>
                  <div class="select-store__selected card card-body"
                     style="border-radius: 10px !important; width: 100%; margin: 1em 0 2em 0; background-color: white; box-shadow: none">
                     <h4>Selected Stores <span class="text-muted" id="select-store__title">1</span></h4>
                     <div class="last-section__territories">
                        <div class="last-section__territories-field">
                           <div class="field-containner">
                              <div class="elements-containner" id="elementStore">
                                 <p class="mb-0 text-muted" id="selected-store__selected-stores" name="stores"></p>
                              </div>
                           </div>
                           <button>Clear Stores</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pricing-boxes">
                  <div class="pricing-boxes__box">
                     <p>iTunes & Apple Music Pricing</p>
                     <div class="checkboxes-containner">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck1" name="checkVal" id="customCheck1" value="Standard">
                           <label class="custom-control-label" for="customCheck2">Standard</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck2" name="checkVal" id="customCheck3" value="Lowest">
                           <label class="custom-control-label" for="customCheck3">Lowest</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck3" name="checkVal" id="customCheck33" value="Low">
                           <label class="custom-control-label" for="customCheck33">Low</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck4" name="checkVal" id="customCheck4" value="High">
                           <label class="custom-control-label" for="customCheck4">High</label>
                        </div>
                     </div>
                  </div>
                  <div class="pricing-boxes__box">
                     <p>Amazone Pricing</p>
                     <div class="checkboxes-containner">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck1" id="customCheck2" ✓>
                           <label class="custom-control-label" for="customCheck5">Standard</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck2" id="customCheck6">
                           <label class="custom-control-label" for="customCheck6">Lowest</label>
                        </div>
                        <div class="custom-control custom-checkbox customCheck4">
                           <input type="checkbox" class="custom-control-input customCheck3" id="customCheck7">
                           <label class="custom-control-label" for="customCheck7">Low</label>
                        </div>
                        <div class="custom-control custom-checkbox customCheck5">
                           <input type="checkbox" class="custom-control-input customCheck4" id="customCheck8">
                           <label class="custom-control-label" for="customCheck8">High</label>
                        </div>
                     </div>
                  </div>
                  <div class="pricing-boxes__box">
                     <p>Googleplay Pricing</p>
                     <div class="checkboxes-containner">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck1" id="customCheck9" ✓>
                           <label class="custom-control-label" for="customCheck9">Standard</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck2" id="customCheck10">
                           <label class="custom-control-label" for="customCheck10">Lowest</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck3" id="customCheck11">
                           <label class="custom-control-label" for="customCheck11">Low</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck4" id="customCheck12">
                           <label class="custom-control-label" for="customCheck12">High</label>
                        </div>
                     </div>
                  </div>
                  <div class="pricing-boxes__box">
                     <p>7digital Pricing</p>
                     <div class="checkboxes-containner">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck1" id="customCheck13" ✓>
                           <label class="custom-control-label" for="customCheck13">Standard</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck2" id="customCheck14">
                           <label class="custom-control-label" for="customCheck14">Lowest</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck3" id="customCheck15">
                           <label class="custom-control-label" for="customCheck15">Low</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck4" id="customCheck16">
                           <label class="custom-control-label" for="customCheck16">High</label>
                        </div>
                     </div>
                  </div>
                  <div class="pricing-boxes__box">
                     <p>Tencent Pricing</p>
                     <div class="checkboxes-containner">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck1" id="customCheck17" ✓>
                           <label class="custom-control-label" for="customCheck17">Standard</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck2" id="customCheck18">
                           <label class="custom-control-label" for="customCheck18">Lowest</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck3" id="customCheck19">
                           <label class="custom-control-label" for="customCheck19">Low</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck4" id="customCheck20">
                           <label class="custom-control-label" for="customCheck20">High</label>
                        </div>
                     </div>
                  </div>
                  <div class="pricing-boxes__box">
                     <p>Qobuz Pricing</p>
                     <div class="checkboxes-containner">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck1" id="customCheck21" ✓>
                           <label class="custom-control-label" for="customCheck21">Standard</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck2" id="customCheck22">
                           <label class="custom-control-label" for="customCheck22">Lowest</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck3" id="customCheck23">
                           <label class="custom-control-label" for="customCheck23">Low</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input customCheck4" id="customCheck24">
                           <label class="custom-control-label" for="customCheck24">High</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="last-section">
                  <select class="custom-select custom-select-lg mb-3" name="choiceTerr">
                     <option value="1" selected>Include These Territories</option>
                     <option value="0">Exclude These Territories</option>
                  </select>
                  <div class="last-section__territories">
                     <p>Territories</p>
                     <div class="last-section__territories-field">
                        <div class="field-containner">
                           <div class="elements-containner" id="elementStore">
                              @foreach($territiores as $t)
                              <div class="element">
                                 <input type="text" style="display:none;" name="territories[]" value="{{$t[0]}}">
                                 <span>{{$t[1]}}</span>
                                 <span class="delete">
                                 <img src="{{asset('assets/img/icons/close.svg')}}" alt="close icon"
                                    class="delete-img">
                                 </span>
                              </div>
                              @endforeach
                           </div>
                           <input type="text" placeholder="Type..">
                        </div>
                        <button>Clear territories</button>
                     </div>
                  </div>
                  <p><span>WARNING:</span> For Woridwide distribution please DO NOT add Territory information. elected
                     Stores with NO additional Territory information will be distributed Woridiwide.
                  </p>
               </div>
               <!--Save banner-->
               <div class="card mt-5 save-banner" style="border-radius: 10px !important; width: 100%">
                  <div class="card-body d-flex justify-content-between align-items-center text-center">
                     <div class="col-md-4 d-flex justify-content-center">
                        <a href="{{route('show-album',$album->id)}}" class="d-flex justify-content-center align-items-center"
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
   </div>
   </div>
   </div>
</div>
@endsection
