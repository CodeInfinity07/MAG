@extends('admin.includes.master-new')
@section('title', 'Dashboard')
@yield('stylesheet')
<meta name="_token" content="{{ csrf_token() }}">
<style>
   .myUL {
   /* Remove default list styling */
   list-style-type: none;
   padding: 0;
   margin: 0;
   }
   .myUL li a {
   border: 1px solid #ddd; /* Add a border to all links */
   margin-top: -1px; /* Prevent double borders */
   background-color: #f6f6f6; /* Grey background color */
   padding: 12px; /* Add some padding */
   text-decoration: none; /* Remove default text underline */
   font-size: 18px; /* Increase the font-size */
   color: black; /* Add a black text color */
   display: block; /* Make it into a block element to fill the whole list */
   }
   .myUL li a:hover:not(.header) {
   background-color: #eee; /* Add a hover effect to all links, except for headers */
   }
</style>
@section('content')
<div class="main-content">
@include('admin/includes/header-new')
<div class="home-section-four pt-5">
   <div class="m-md-4">
      @foreach($fetch as $f)
      <div class="track_container">
      <form action="/audiodetailsstore/{{$f->id}}" method="post">
         @csrf
         <div id="Track{{$f->id}}">
            <div class="container-fluid custom-tabs">
               <div class="row pt-4">
                  <div class="col-lg-12">
                     <div class="card bg-light" style="border-radius: 10px !important;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                           <div class="d-flex justify-content-center align-items-center fw-bolder">
                              <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Track: {{$f->song}}</div>
                           </div>
                           <button type="button" class="btn" onclick="removeElement('Track{{$f->id}}')">
                              <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                 style="width: 30px;height: 30px">X</div>
                           </button>
                        </div>
                     </div>
                     <div class="row justify-content-center m-auto mb-4">
                        <div class="col-lg-8 col-md-8">
                           <div class="row mt-4">
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for=""> Track Name <span
                                       class="text-danger">*</span></label>
                                    <input type="text" name="trackName" id="input-rate"
                                       class="form-control @error('album') is-invalid @enderror"
                                       placeholder="Album" value="{{$f->song_name}}" required="">
                                 </div>
                              </div>
                              <div class="col-md-6 col-lg-6 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="Language">Language <span
                                       class="text-danger">*</span></label>
                                    <select type="text" name="Language" id="Language"
                                       class="form-control form-control-select ">
                                       <option value="English" class="form-control form-control-select py-2">
                                          English
                                       </option>
                                       @foreach ($languages as $language)
                                       <option value="{{ $language[0] }}"
                                          class="form-control form-control-select py-2">
                                          {{ $language[0] }}
                                       </option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6 col-lg-6 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="content">Explicit Content
                                    <span class="text-danger">*</span></label>
                                    <select type="text" name="contente" id="content"
                                       class="form-control form-control-select ">
                                       <option value="" class="form-control form-control-select py-2"
                                          disabled selected>Select</option>
                                       <option value="Explicit" class="form-control form-control-select py-2">
                                          Explicit
                                       </option>
                                       <option value="Not Explicit" class="form-control form-control-select py-2">Not
                                          Explicit
                                       </option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-4">
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for=""> Track Version <span
                                       class="text-danger">*</span></label>
                                    <input type="text" name="trackVersion" id="input-rate"
                                       class="form-control @error('album') is-invalid @enderror"
                                       placeholder="Version" value="" required="">
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="">ISRC Code</label>
                                    <input type="text" name="record" id="input-rate"
                                       class="form-control @error('record') is-invalid @enderror"
                                       placeholder=" Record Label Name" value=""
                                       required >
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="song_number">Track Number <span
                                       class="text-danger">*</span></label>
                                    <select type="text" name="song_number" id="song_number"
                                       class="form-control form-control-select" >
                                       <option value="" disabled selected>Select Track Number:  </option>
                                       @foreach ($tr as $t)
                                       <option value="{{ $t }}"
                                          class="form-control form-control-select py-2">
                                          {{ $t }}
                                       </option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 col-lg-12 my-3">
                              <div class="form-group focused">
                                 <label class="form-control-label" for=""> Is it Featuring? <span
                                    class="text-danger">*</span></label>
                                 <input type="radio" id="feature_no" name="featuring" value="No" checked>
                                 <label for="feature_no">No</label>&nbsp
                                 <input type="radio" id="feature_yes" name="featuring" value="Yes">
                                 <label for="feature_yes">Yes</label>
                              </div>
                           </div>
                           <div class="col-md-12 col-lg-12 my-3">
                              <div class="form-group focused">
                                 <label class="form-control-label" for=""> Is it Collaboration? <span
                                    class="text-danger">*</span></label>
                                 <input type="radio" id="collab_no" name="collaboration" value="No" checked>
                                 <label for="collab_no">No</label>&nbsp
                                 <input type="radio" id="collab_yes" name="collaboration" value="Yes">
                                 <label for="collab_yes">Yes</label>
                              </div>
                           </div>
                           <div class="px-4 py-4"
                              style="border-radius: 15px;border:1px #c6c5c5 solid;background: rgba(255,255,255,0.07)">
                              <div class="form-group focused mt-3">
                                 <label class="form-control-label mb-3" for="">Artist name <span class="text-danger">*</span></label>
                                 <div class="row mb-3">
                                    <div class="col-md-3">
                                       <input type="text" name="artist_genre[]" id="input-type" class="form-control" value="Primary" readonly required="">
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" name="artist_name[]" id="inpArtist0" class="form-control input-typeName" value="{{ auth()->user()->name }}" readonly required>
                                       <ul class="myUL">
                                       </ul>
                                    </div>
                                    <input type="text" name="artist_link[]" class="form-control input-typeName" value="" style="display: none;" readonly required>
                                 </div>
                                 <div class="row mb-3">
                                    <div class="col-md-3">
                                       <input type="text" name="artist_genre[]" class="form-control" value="Lyricist" readonly required="">
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" name="artist_name[]" class="form-control input-typeName" value=""  required>
                                       <ul class="myUL">
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <div class="col-md-3">
                                       <input type="text" name="artist_genre[]" class="form-control" value="Publisher" readonly required="">
                                    </div>
                                    <div class="col-md-9">
                                       <input type="text" name="artist_name[]" class="form-control input-typeName" value=""  required>
                                       <ul class="myUL">
                                       </ul>
                                    </div>
                                 </div>
                                 <div id="newElementId"></div>
                              </div>
                              <div class="d-flex justify-content-end">
                                 <button class="btn btn-primary btn-lg col-md-2 py-2 " id="add_button" onclick="createNewElement()" type="button" data-id="1" style="font-size:18px;border-radius: 15px" disabled>Add</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body d-flex justify-content-between align-items-center text-center">
               <div class="col-md-6">
                  <button class="btn btn-primary btn-lg  py-3 col-md-4" type="submit"
                     style="font-size:20px;border-radius: 15px">Save</button>
               </div>
            </div>
      </form>
      </div>
      @endforeach
      </div>
   </div>
</div>
@endsection
@section('myScripts')
<script>
   $('.track_container:odd').css('background-color','#EFFBFB');

</script>
<script>
   $('input[type=radio][name=featuring]').change(function() {
       if (this.value == 'Yes') {
           $('input[type=radio][name=collaboration]').prop('disabled', true);
           $('#add_button').prop("disabled", false);
       }
       else if (this.value == 'No') {
         $('input[type=radio][name=collaboration]').prop('disabled', false);
         $('#add_button').prop("disabled", true);
       }
   });

   $('input[type=radio][name=collaboration]').change(function() {
       if (this.value == 'Yes') {
           $('input[type=radio][name=featuring]').prop('disabled', true);
           $('#add_button').prop("disabled", false);
       }
       else if (this.value == 'No') {
         $('input[type=radio][name=featuring]').prop('disabled', false);
         $('#add_button').prop("disabled", true);
       }
   });
</script>
<script type="text/javascript">
   $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });
</script>
<script type="text/javascript">
   $(document).on('keyup', '.input-typeName',function(){
     var value = $(this).val();
     var elem = $(this).parent();
     console.log(value);
     $.ajax({
     type : 'POST',
     url : '/searchArtist',
     data:{'artist_name':value},
     success:function(data){
       elem.find('ul').empty();
       elem.find('ul').append(data);
     },
     error:function(data){
       console.log(data);
       elem.find('ul').empty();
     }
     });

   })
</script>
<script>
   var nmstring = "Artist"
   var count = 0;

   function createNewElement() {
     count = count + 1;
     var revten = nmstring + count;
     var txtNewInputBox = document.createElement('div');
     var msg2 = '<div id=${revten} class="mt-5"> <div class="row mb-3"> <div class="col-md-3"> <select id="artist-list" class="form-control" name="artist_genre[]"> <option value="Primary" selected>Primary</option> <option value="Composer">Composer</option> <option value="Featuring">Featuring</option> <option value="Producer">Producer</option> <option value="Actor">Actor</option> <option value="Performer">Performer</option> <option value="DJ">DJ</option> <option value="Remixer">Remixer</option> <option value="Conductor">Conductor</option> <option value="Lyricist">Lyricist</option> <option value="Arranger">Arranger</option> <option value="Orchestra">Orchestra</option> </select> </div> <div class="col-md-9"> <input type="text" name="artist_name[]" id="inp${revten}" class="form-control input-typeName" required> <ul class="myUL"></ul> </div> </div> <div class="row mb-3"> <div class="col-md-3"> <input type="text" name="artist_genre[]" class="form-control" value="Lyricist" readonly required=""> </div> <div class="col-md-9"> <input type="text" name="artist_name[]" class="form-control input-typeName" value=""  required> <ul class="myUL"> </ul> </div> </div> <div class="row mb-3"> <div class="col-md-3"> <input type="text" name="artist_genre[]" class="form-control" value="Publisher" readonly required=""> </div> <div class="col-md-9"> <input type="text" name="artist_name[]" class="form-control input-typeName" value=""  required> <ul class="myUL"> </ul> </div> </div> <button class="btn btn-danger btn-lg" onclick="registerClickHandler(${revten})" type="button" >Remove</button> </div>';

      const regexp = /\${([^{]+)}/g;
      let result = msg2.replace(regexp, function(ignore, key){
         return eval(key);
      });
      txtNewInputBox.innerHTML = result;
      document.getElementById("newElementId").appendChild(txtNewInputBox);
   }

   function registerClickHandler(el) {
       el.parentNode.removeChild(el);
       count=count-1;
   }

   function removeElement(id) {
     return document.getElementById(id).remove();
   }
</script>
<script type="text/javascript">
   $(document).on('click', 'ul li a', function (e) {
     e.preventDefault();
     var example1 = $(this).parent().parent().parent();
     console.log(example1);

     var id_string = example1.find('input');
     var ul_string = example1.find('ul');
     $(id_string).val($(this).text());
     $(ul_string).hide();
     $(example1).append('<input type="text" name="artist_link[]" style="display: none;" value="https://open.spotify.com/artist/'+ $(this).attr('id') +'">');
   });
</script>
@endsection
