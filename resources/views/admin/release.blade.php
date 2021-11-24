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
         <div class="container-fluid custom-tabs">
            <div class="row pt-4">
               <div class="col-lg-12">
                  <div class="card bg-light" style="border-radius: 10px !important;">
                     <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-center align-items-center fw-bolder">
                           <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Album Details</div>
                        </div>
                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top"
                           title="Tooltip on top">
                           <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                              style="width: 30px;height: 30px"><i class="fa fa-question text-white"></i></div>
                        </button>
                     </div>
                  </div>
                  <div class="row justify-content-center m-auto mb-4">
                     <div class="col-lg-8 col-md-8">
                        <form action="{{route('release.store',$album->id)}}" method="post">
                           @csrf
                           <div class="row mt-4">
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
                                    <select type="text" name="explicitContent" id="content"
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
                                    @error('departments')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-4">
                              <div class="col-md-6 col-lg-6 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="primaryGenre"> Primary Genre <span
                                       class="text-danger">*</span></label>
                                    <select type="text" name="primaryGenre" id="primaryGenre"
                                       class="form-control form-control-select ">
                                       <option value="Adult Contemporary">Adult Contemporary</option>
                                       <option value="Anime">Anime</option>
                                       <option value="Audio Books">Audio Books</option>
                                       <option value="Blues">Blues</option>
                                       <option value="Children's Music">Children's Music</option>
                                       <option value="Christian">Christian</option>
                                       <option value="Classical">Classical</option>
                                       <option value="Comedy">Comedy</option>
                                       <option value="Country">Country</option>
                                       <option value="Easy Listening">Easy Listening</option>
                                       <option value="Educational">Educational</option>
                                       <option value="Electronic">Electronic</option>
                                       <option value="Fitness & Workout">Fitness & Workout</option>
                                       <option value="Folk">Folk</option>
                                       <option value="HipHop/Rap">HipHop/Rap</option>
                                       <option value="Holiday Music">Holiday Music</option>
                                       <option value="Indian">Indian</option>
                                       <option value="Industrial">Industrial</option>
                                       <option value="Inspirational">Inspirational</option>
                                       <option value="Instructional">Instructional</option>
                                       <option value="Jazz">Jazz</option>
                                       <option value="Karaoke">Karaoke</option>
                                       <option value="Latin">Latin</option>
                                       <option value="Motown">Motown</option>
                                       <option value="Oldies">Oldies</option>
                                       <option value="Pop">Pop</option>
                                       <option value="R&B/Soul">R&B/Soul</option>
                                       <option value="Reggae">Reggae</option>
                                       <option value="Rock">Rock</option>
                                       <option value="Samba">Samba</option>
                                       <option value="Soundtracks">Soundtracks</option>
                                       <option value="Spoken Word">Spoken Word</option>
                                       <option value="World">World</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6 col-lg-6 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="secondaryGenre">Secondary Genre
                                    <span class="text-danger">*</span></label>
                                    <select type="text" name="secondaryGenre" id="secondaryGenre"
                                       class="form-control form-control-select ">
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-4">
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for=""> Album/Single/EP Title <span
                                       class="text-danger">*</span></label>
                                    <div class="text-muted mb-4" style="font-size: 16px">
                                       If you don’t have a formality agreed level, your artist name or
                                       barand name will be sufficient. description such as “indie” ,
                                       “independent”, “non” will not be accepted.
                                    </div>
                                    <input type="text" name="title" id="input-rate"
                                       class="form-control @error('album') is-invalid @enderror"
                                       placeholder="Album" value="{{ $Rname }}" required="">
                                    @error('album')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for=""> Album Version <span
                                       class="text-danger">*</span></label>
                                    <input type="text" name="titleVersion" id="input-rate"
                                       class="form-control @error('album') is-invalid @enderror"
                                       placeholder="Version" value="" required="">
                                    @error('album')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for=""> Compilation Album <span
                                       class="text-danger">*</span></label>
                                    <input type="radio" id="compileNo" name="compilation" value="No" checked>
                                    <label for="html">No</label>&nbsp
                                    <input type="radio" id="compileYes" name="compilation" value="Yes">
                                    <label for="css">Yes</label>
                                    @error('album')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                    @enderror
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
                                          <input type="text" name="artist_name[]" id="inpArtist0" class="form-control input-typeName" value="{{ auth()->user()->name }}" required readonly>
                                          <ul id="ULinpArtist0" class="myUL">

                                            <input type="text" name="artist_link[]" style="display: none;" value="">
                                          </ul>
                                       </div>
                                    </div>
                                    <div id="newElementId"></div>
                                 </div>
                                 <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary btn-lg col-md-2 py-2 " onclick="createNewElement()" type="button" data-id="1" style="font-size:18px;border-radius: 15px">Add</button>
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-12 my-3">
                                 @if ($typeAcc == 'free')
                                 <div class="form-group focused">
                                    <label class="form-control-label" for=""> Record Label Name <span
                                       class="text-danger">*</span></label>
                                    <div class="text-muted mb-4" style="font-size: 16px">
                                       If you don’t have a formality agreed level, your artist name or
                                       barand name will be sufficient. description such as “indie” ,
                                       “independent”, “non” will not be accepted.
                                    </div>
                                    <input type="text" name="record" id="input-rate"
                                       class="form-control @error('record') is-invalid @enderror"
                                       placeholder=" Record Label Name" value="MaDigital{{$labels->account_id}}"
                                       required readonly>
                                 </div>
                                 @else
                                 <div class="form-group focused">
                                    <label class="form-control-label" for=""> Record Label Name <span
                                       class="text-danger">*</span></label>
                                    <div class="text-muted mb-4" style="font-size: 16px">
                                       If you don’t have a formality agreed level, your artist name or
                                       barand name will be sufficient. description such as “indie” ,
                                       “independent”, “non” will not be accepted.
                                    </div>
                                    <input type="text" name="record" id="input-rate"
                                       class="form-control @error('record') is-invalid @enderror"
                                       placeholder=" Record Label Name" value="$labels->premium_label_id"
                                       required readonly>
                                 </div>
                                 @endif
                              </div>
                              @if ($typeAcc == "free")
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="">Composition copyright © <span
                                       class="text-danger">*</span></label>
                                    <div class="row">
                                      @if(isset($c_year))
                                      <div class="col-lg-3">
                                         <input type="year" name="c_year" id="input-rate"
                                            class="form-control @error('c_year') is-invalid @enderror px-4"
                                            value="{{$c_year}}"
                                            required readonly>
                                      </div>
                                      @else
                                       <div class="col-lg-3">
                                          <input type="year" name="c_year" id="input-rate"
                                             class="form-control @error('c_year') is-invalid @enderror px-4"
                                             value="2021"
                                             required>
                                       </div>
                                       @endif
                                       @if(isset($c_license))
                                       <div class="col-lg-9">
                                          <input type="text" name="c_license" id="input-rate"
                                             class="form-control @error('c_license') is-invalid @enderror px-4"
                                             placeholder="Under exclusive license to maDigital"
                                             value="{{$c_license}}" required readonly>
                                       </div>
                                       @else
                                       <div class="col-lg-9">
                                          <input type="text" name="c_license" id="input-rate"
                                             class="form-control @error('c_license') is-invalid @enderror px-4"
                                             placeholder="Under exclusive license to maDigital"
                                             value="Under exclusive license to MaDigital" required readonly>
                                       </div>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="">Sound Recording Copyright © <span
                                       class="text-danger">*</span></label>
                                    <div class="row">
                                      @if(isset($r_year))
                                      <div class="col-lg-3">
                                         <input type="year" name="r_year" id="input-rate"
                                            class="form-control @error('r_year') is-invalid @enderror px-4"
                                            value="{{$r_year}}"
                                            required readonly>
                                      </div>
                                      @else
                                       <div class="col-lg-3">
                                          <input type="year" name="r_year" id="input-rate"
                                             class="form-control @error('r_year') is-invalid @enderror px-4"
                                             value="2021"
                                             required>
                                       </div>
                                       @endif
                                       @if(isset($r_license))
                                       <div class="col-lg-9">
                                          <input type="text" name="r_license" id="input-rate"
                                             class="form-control @error('r_license') is-invalid @enderror px-4"
                                             placeholder="Under exclusive license to maDigital"
                                             value="{{$r_license}}" required  readonly>
                                       </div>
                                       @else
                                       <div class="col-lg-9">
                                          <input type="text" name="r_license" id="input-rate"
                                             class="form-control @error('r_license') is-invalid @enderror px-4"
                                             placeholder="Under exclusive license to maDigital"
                                             value="Under exclusive license to MaDigital" required  readonly>
                                       </div>
                                      @endif
                                    </div>
                                 </div>
                              </div>
                              @else
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="">Composition copyright © <span
                                       class="text-danger">*</span></label>
                                    <div class="row">
                                       <div class="col-lg-3">
                                          <input type="year" name="c_year" id="input-rate"
                                             class="form-control @error('c_year') is-invalid @enderror px-4"
                                             placeholder="2021" value="{{ old('c_year') }}"
                                             required="">
                                       </div>
                                       <div class="col-lg-9">
                                          <input type="text" name="c_license" id="input-rate"
                                             class="form-control @error('c_license') is-invalid @enderror px-4"
                                             placeholder="Under exclusive license to maDigital"
                                             value="{{ old('rate') }}" required >
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
                                          <input type="year" name="r_year" id="input-rate"
                                             class="form-control @error('r_year') is-invalid @enderror px-4"
                                             placeholder="2021" value="{{ old('r_year') }}"
                                             required="">
                                       </div>
                                       <div class="col-lg-9">
                                          <input type="text" name="r_license" id="input-rate"
                                             class="form-control @error('r_license') is-invalid @enderror px-4"
                                             placeholder="Under exclusive license to maDigital"
                                             value="{{ old('rate') }}" required>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              <div class="col-md-6 col-lg-6 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="">Orginally Released <span
                                       class="text-danger">*</span></label>
                                    <input type="date" name="org_rel" id="org"
                                       class="form-control @error('org_rel') is-invalid @enderror"
                                       value="{{ old('org_rel') }}" required="">
                                 </div>
                              </div>
                              <div class="col-md-6 col-lg-6 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="">Pre Order date </label>
                                    <input type="date" name="pre_ord" id="prea"
                                       class="form-control @error('pre_ord') is-invalid @enderror"
                                       value="{{ old('pre_ord') }}" required="">
                                    @error('pre_ord')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6 col-lg-6 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="">Sales Start date</label>
                                    <input type="date" name="sal_st" id="org2"
                                       class="form-control @error('sal_st') is-invalid @enderror"
                                       value="{{ old('sal_st') }}" required="">
                                    @error('sal_st')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="card mt-5" style="border-radius: 10px !important;">
                              <div class="card-body d-flex justify-content-between align-items-center text-center">
                                 <div class="col-md-4 d-flex justify-content-center">
                                    <a href="{{route('show-album',$album->id)}}" class="d-flex justify-content-center align-items-center"
                                       style="font-size: 1.625em;color: rgba(68,68,68,0.98);border-radius: 50% ;border: 2px #3858f9 solid;width:3.125em;height: 3.125em">
                                    <i class="fa fa-chevron-left text-primary "></i>
                                    </a>
                                 </div>
                                 <div class="col-md-6">
                                    <button class="btn btn-primary btn-lg  py-3 col-md-4" type="submit"
                                       style="font-size:20px;border-radius: 15px">Save</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('myScripts')

<script type="text/javascript">
  $(document).on('keyup', '.input-typeName',function(){
    var thistring = '#UL'+$(this).attr('id');
    console.log(thistring);
    $value = $(this).val();
    $.ajax({
    type : 'POST',
    url : '/searchArtist',
    data:{'artist_name':$value},
    success:function(data){
      $(thistring).empty();
      $(thistring).append(data);
    },
    error:function(data){
      console.log(data);
      $(thistring).empty();
    }
    });
  })

  $(document).on('keydown', '.input-typeName',function(){
    $('#UL'+$(this).attr('id')).empty();
  });
</script>

<script type="text/javascript">
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>

<script>
   var nmstring = "Artist"
   var count = 0;

   $("#org2").change(function() {
      var release_date = new Date($("#org2").val());
      var release_date2 = release_date.setDate(release_date.getDate() - 14);
      var min_date = release_date.setDate(release_date.getDate() - 365);
      min_date = new Date(min_date).toISOString().split('T')[0];
      $("#prea").attr({
         "max": new Date(release_date2).toISOString().split('T')[0]
      });

   })

   function createNewElement() {
     count = count + 1;
     var revten = nmstring + count;
   	 var txtNewInputBox = document.createElement('div');
   	 var msg2 = '<div class="row mb-3" id=${revten}><div class="col-md-3"><select id="artist-list" class="form-control" name="artist_genre[]"> <option value="Primary" selected>Primary</option> <option value="Composer">Composer</option> <option value="Featuring">Featuring</option> <option value="Producer">Producer</option> <option value="Actor">Actor</option> <option value="Performer">Performer</option> <option value="DJ">DJ</option> <option value="Remixer">Remixer</option> <option value="Conductor">Conductor</option><option value="Lyricist">Lyricist</option><option value="Arranger">Arranger</option><option value="Orchestra">Orchestra</option></select></div><div class="col-md-6"><input type="text" name="artist_name[]" id="inp${revten}" class="form-control input-typeName" required> <ul id="ULinp${revten}" class="myUL"></ul></div><button class="btn btn-danger btn-lg" onclick="registerClickHandler(${revten})" type="button" >Remove</button></div>';

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

   $('form').submit(function(e) {
        $(':disabled').each(function(e) {
            $(this).removeAttr('disabled');
        })
    });

   $('input[type=radio][name=compilation]').change(function() {
       if (this.value == 'Yes') {
           $("#inpArtist0").val("VariousArtists");
       }
       else if (this.value == 'No') {
         $("#inpArtist0").val("{{ auth()->user()->name }}");
       }
   });

   $("#primaryGenre").on("change", function() {
     if ($(this).val() == "Anime" ) {
       $("#secondaryGenre").empty().append('<option value="Anime">Anime</option>');
     }

     else if ($(this).val() == "Adult Contemporary" ) {
       $("#secondaryGenre").empty().append('<option value="Adult">Adult</option> <option value="Adult Contemporary">Adult Contemporary</option> <option value="Adult Contemporary (Singer/Songwriter)">Adult Contemporary (Singer/Songwriter)</option> <option value="Easy Listening">Easy Listening</option>');
     }

     else if ($(this).val() == "Audio Books" ) {
       $("#secondaryGenre").empty().append('<option value="Audio Books">Audio Books</option>');
     }

     else if ($(this).val() == "Blues" ) {
       $("#secondaryGenre").empty().append('<option value="Blues">Blues</option>');
     }

     else if ($(this).val() == "Children's Music" ) {
       $("#secondaryGenre").empty().append('<option value="Children Music">Children Music</option> <option value="Childrens">Childrens</option>');
     }

     else if ($(this).val() == "Christian" ) {
       $("#secondaryGenre").empty().append('<option value="Christian">Christian</option> <option value="Christian Pop">Christian Pop</option> <option value="Christian Rap/Hip-Hop">Christian Rap/Hip-Hop</option> <option value="Christian Rock">Christian Rock</option> <option value="Gospel">Gospel</option> <option value="Religious">Religious</option>');
     }

     else if ($(this).val() == "Classical" ) {
       $("#secondaryGenre").empty().append('<option value="3 Trumpets & Orchest">3 Trumpets & Orchest</option> <option value="4 Bassoons">4 Bassoons</option> <option value="4 Clarinets & Orches">4 Clarinets & Orches</option> <option value="Adaptations">Adaptations</option> <option value="Airs de cour">Airs de cour</option> <option value="Ambrosiam Chant">Ambrosiam Chant</option> <option value="Anthem">Anthem</option> <option value="Antiphon">Antiphon</option> <option value="Aria">Aria</option> <option value="Balalaika Concerto">Balalaika Concerto</option> <option value="Ballad">Ballad</option> <option value="Ballet">Ballet</option> <option value="Ballet Suite">Ballet Suite</option> <option value="Bamboo Flute">Bamboo Flute</option> <option value="Baroque">Baroque</option> <option value="Baryton Trio">Baryton Trio</option> <option value="Baryton(s) Sonata">Baryton(s) Sonata</option> <option value="Bass Tuba Concerto">Bass Tuba Concerto</option> <option value="Bass viol sonata">Bass viol sonata</option> <option value="Bassoon and Piano">Bassoon and Piano</option> <option value="Bassoon Concerto">Bassoon Concerto</option> <option value="Bassoon Sonata">Bassoon Sonata</option> <option value="Big Band">Big Band</option> <option value="Brass">Brass</option> <option value="Brass and Chorus">Brass and Chorus</option> <option value="Brass and Percussion">Brass and Percussion</option> <option value="Brass Quintet">Brass Quintet</option> <option value="Canon">Canon</option> <option value="Cantata">Cantata</option> <option value="Canticle">Canticle</option> <option value="Carol">Carol</option> <option value="Cello">Cello</option> <option value="Cello and Orchestra">Cello and Orchestra</option> <option value="Cello and Piano">Cello and Piano</option> <option value="Cello Concerto">Cello Concerto</option> <option value="Cello Sonata">Cello Sonata</option> <option value="Cello Sonata (bc)">Cello Sonata (bc)</option> <option value="Chalumeau Concerto">Chalumeau Concerto</option> <option value="Chamber">Chamber</option> <option value="Chamber Concerto">Chamber Concerto</option> <option value="Chanson">Chanson</option> <option value="Chant">Chant</option> <option value="Chinese - 12th C">Chinese - 12th C</option> <option value="Choral">Choral</option> <option value="Chorus and Orchestra">Chorus and Orchestra</option> <option value="Cimbalom">Cimbalom</option> <option value="Clarinet">Clarinet</option> <option value="Clarinet & Orchestra">Clarinet & Orchestra</option> <option value="Clarinet and Orchest">Clarinet and Orchest</option> <option value="Clarinet Concerto">Clarinet Concerto</option> <option value="Clarinet Quartet">Clarinet Quartet</option> <option value="Clarinet Quintet">Clarinet Quintet</option> <option value="Clarinet Sonata">Clarinet Sonata</option> <option value="Clarinet Trio">Clarinet Trio</option> <option value="Classical">Classical</option> <option value="Classical Guitar">Classical Guitar</option> <option value="Clock-Organ">Clock-Organ</option> <option value="Concert Aria">Concert Aria</option> <option value="Concertante Piece">Concertante Piece</option> <option value="Concerto">Concerto</option> <option value="Concerto grosso">Concerto grosso</option> <option value="Conductus">Conductus</option> <option value="Consort Music">Consort Music</option> <option value="Consort of Viols">Consort of Viols</option> <option value="Contemporary Classical">Contemporary Classical</option> <option value="Dances">Dances</option> <option value="Declamation">Declamation</option> <option value="Devotional Song">Devotional Song</option> <option value="Didgeridoo">Didgeridoo</option> <option value="Divertimento">Divertimento</option> <option value="Double Bass">Double Bass</option> <option value="Double Bass & Orch">Double Bass & Orch</option> <option value="Double Bass & Piano">Double Bass & Piano</option> <option value="Double Bass Concerto">Double Bass Concerto</option> <option value="Double Concerto">Double Concerto</option> <option value="Drama">Drama</option> <option value="Dramatic cantata">Dramatic cantata</option> <option value="Duet">Duet</option> <option value="Duo">Duo</option> <option value="English cantata">English cantata</option> <option value="English Horn & Orch">English Horn & Orch</option> <option value="English song">English song</option> <option value="Ensemble">Ensemble</option> <option value="Fanfare">Fanfare</option> <option value="Fantasia">Fantasia</option> <option value="Film music">Film music</option> <option value="Film Score">Film Score</option> <option value="Flute">Flute</option> <option value="Flute and Guitar">Flute and Guitar</option> <option value="Flute and Orchestra">Flute and Orchestra</option> <option value="Flute and Piano">Flute and Piano</option> <option value="Flute Concerto">Flute Concerto</option> <option value="Flute Quartet">Flute Quartet</option> <option value="Flute Quintet">Flute Quintet</option> <option value="Flute Sonata">Flute Sonata</option> <option value="Folk songs">Folk songs</option> <option value="French cantata">French cantata</option> <option value="Frottola">Frottola</option> <option value="Fugue">Fugue</option> <option value="Full anthem">Full anthem</option> <option value="Funeral music">Funeral music</option> <option value="Gamelan">Gamelan</option> <option value="German cantata">German cantata</option> <option value="Graduale">Graduale</option> <option value="Gregorian Chant">Gregorian Chant</option> <option value="Gu-zheng & Orch">Gu-zheng & Orch</option> <option value="Guitar">Guitar</option> <option value="Guitar & Orchestra">Guitar & Orchestra</option> <option value="Guitar Concerto">Guitar Concerto</option> <option value="Guitar Quintet">Guitar Quintet</option> <option value="Guitar Sonata">Guitar Sonata</option> <option value="Hardanger Fiddle">Hardanger Fiddle</option> <option value="Harmonica">Harmonica</option> <option value="Harmonica & Orch">Harmonica & Orch</option> <option value="Harmonica Concerto">Harmonica Concerto</option> <option value="Harp">Harp</option> <option value="Harp and Orchestra">Harp and Orchestra</option> <option value="Harp Concerto">Harp Concerto</option> <option value="Harp Quintet">Harp Quintet</option> <option value="Harpsichord">Harpsichord</option> <option value="Harpsichord - Two">Harpsichord - Two</option> <option value="Harpsichord Concerto">Harpsichord Concerto</option> <option value="Horn and Orchestra">Horn and Orchestra</option> <option value="Horn and Piano">Horn and Piano</option> <option value="Horn Concerto">Horn Concerto</option> <option value="Horn Sonata">Horn Sonata</option> <option value="Horns and Orchestra">Horns and Orchestra</option> <option value="Hymn">Hymn</option> <option value="Incidental Music">Incidental Music</option> <option value="Instrumental">Instrumental</option> <option value="Intermezzo">Intermezzo</option> <option value="Ital. sacred cantata">Ital. sacred cantata</option> <option value="Italian aria">Italian aria</option> <option value="Italian cantata">Italian cantata</option> <option value="Italian duet">Italian duet</option> <option value="Italian trio">Italian trio</option> <option value="Japanese Music">Japanese Music</option> <option value="Jazz">Jazz</option> <option value="Jazz Band/Orchestra">Jazz Band/Orchestra</option> <option value="Jazz ensemble">Jazz ensemble</option> <option value="Jews Harp">Jews Harp</option> <option value="Keyboard">Keyboard</option> <option value="Keyboard arrangement">Keyboard arrangement</option> <option value="Keyboard Concerto">Keyboard Concerto</option> <option value="Lai">Lai</option> <option value="Liturgical">Liturgical</option> <option value="Lute">Lute</option> <option value="Lute Concerto">Lute Concerto</option> <option value="Madrigal">Madrigal</option> <option value="Madrigal Comedies">Madrigal Comedies</option> <option value="Mandocello">Mandocello</option> <option value="Mandolin">Mandolin</option> <option value="Mandolin Concerto">Mandolin Concerto</option> <option value="Mandora">Mandora</option> <option value="March">March</option> <option value="Marionette Opera">Marionette Opera</option> <option value="Masque">Masque</option> <option value="Mass">Mass</option> <option value="Mechanical Clock">Mechanical Clock</option> <option value="Medieval">Medieval</option> <option value="Medieval- Ars Nova">Medieval- Ars Nova</option> <option value="Medieval- Sacred">Medieval- Sacred</option> <option value="Medieval- Secular">Medieval- Secular</option> <option value="Melodrama">Melodrama</option> <option value="Misc. Sacred Music">Misc. Sacred Music</option> <option value="Modern Composition">Modern Composition</option> <option value="Monodrama">Monodrama</option> <option value="Motet">Motet</option> <option value="Mozarabic Chant">Mozarabic Chant</option> <option value="Musical">Musical</option> <option value="Musical Humor">Musical Humor</option> <option value="Mystery Play">Mystery Play</option> <option value="Nonet">Nonet</option> <option value="Oboe">Oboe</option> <option value="Oboe and Orchestra">Oboe and Orchestra</option> <option value="Oboe and Piano">Oboe and Piano</option> <option value="Oboe Concerto">Oboe Concerto</option> <option value="Oboe damore">Oboe damore</option> <option value="Oboe Sonata">Oboe Sonata</option> <option value="Octet">Octet</option> <option value="Ode">Ode</option> <option value="Op">Op</option> <option value="Opera">Opera</option> <option value="Opera (pasticcio)">Opera (pasticcio)</option> <option value="Operetta">Operetta</option> <option value="Oratorio">Oratorio</option> <option value="Oratorio (pasticcio)">Oratorio (pasticcio)</option> <option value="Orchestra and Band">Orchestra and Band</option> <option value="Orchestra and Chorus">Orchestra and Chorus</option> <option value="Orchestral">Orchestral</option> <option value="Orchestral Suite">Orchestral Suite</option> <option value="Organ">Organ</option> <option value="Organ and Brass">Organ and Brass</option> <option value="Organ and Orchestra">Organ and Orchestra</option> <option value="Organ and Winds">Organ and Winds</option> <option value="Organ Chorale">Organ Chorale</option> <option value="Organ Concerto">Organ Concerto</option> <option value="Organ Partita">Organ Partita</option> <option value="Organum">Organum</option> <option value="Overture">Overture</option> <option value="Pan Flute">Pan Flute</option> <option value="Paris-Symphonies">Paris-Symphonies</option> <option value="Part Song">Part Song</option> <option value="Partita">Partita</option> <option value="Passaglia">Passaglia</option> <option value="Passion">Passion</option> <option value="Pastorale">Pastorale</option> <option value="Percussion">Percussion</option> <option value="Percussion Concerto">Percussion Concerto</option> <option value="Piano">Piano</option> <option value="Piano - 4 Hands">Piano - 4 Hands</option> <option value="Piano - Two">Piano - Two</option> <option value="Piano and Orchestra">Piano and Orchestra</option> <option value="Piano Classical">Piano Classical</option> <option value="Piano Concerto">Piano Concerto</option> <option value="Piano miniatures">Piano miniatures</option> <option value="Piano Quartet">Piano Quartet</option> <option value="Piano Quintet">Piano Quintet</option> <option value="Piano Sextet">Piano Sextet</option> <option value="Piano Sonata">Piano Sonata</option> <option value="Piano Transcription">Piano Transcription</option> <option value="Piano Trio">Piano Trio</option> <option value="Pianos - Two">Pianos - Two</option> <option value="Piccolo & Orchestra">Piccolo & Orchestra</option> <option value="Pipa Concerto">Pipa Concerto</option> <option value="Polka">Polka</option> <option value="Prelude">Prelude</option> <option value="Psalm setting">Psalm setting</option> <option value="Quartet">Quartet</option> <option value="Quintet">Quintet</option> <option value="Recorder">Recorder</option> <option value="Recorder Concerto">Recorder Concerto</option> <option value="Renaissance">Renaissance</option> <option value="Renaissance-Sacred">Renaissance-Sacred</option> <option value="Renaissance-Secular">Renaissance-Secular</option> <option value="Requiem">Requiem</option> <option value="Responsoria">Responsoria</option> <option value="Rhapsody">Rhapsody</option> <option value="Rondellus">Rondellus</option> <option value="Rondo">Rondo</option> <option value="Sacred Drama">Sacred Drama</option> <option value="Sacred Madrigals">Sacred Madrigals</option> <option value="Sacred Song">Sacred Song</option> <option value="Sacred Work">Sacred Work</option> <option value="Saxophone Concerto">Saxophone Concerto</option> <option value="Saxophone Sonata">Saxophone Sonata</option> <option value="Semi-opera">Semi-opera</option> <option value="Septet">Septet</option> <option value="Sequence">Sequence</option> <option value="Sequence & Hymn">Sequence & Hymn</option> <option value="Serenade">Serenade</option> <option value="Serenata">Serenata</option> <option value="Sextet">Sextet</option> <option value="Sinfonia Concertante">Sinfonia Concertante</option> <option value="Singspiel">Singspiel</option> <option value="Solo Instrumental">Solo Instrumental</option> <option value="Solo Sonata">Solo Sonata</option> <option value="Sonata">Sonata</option> <option value="Sonatas for strings">Sonatas for strings</option> <option value="Sonatina">Sonatina</option> <option value="Song">Song</option> <option value="Song Cycle">Song Cycle</option> <option value="Songbook">Songbook</option> <option value="Songs">Songs</option> <option value="Spanish cantata">Spanish cantata</option> <option value="Spanish suite">Spanish suite</option> <option value="Speaker">Speaker</option> <option value="Speaker & Orchestra">Speaker & Orchestra</option> <option value="Speaker & Piano">Speaker & Piano</option> <option value="Speakers & Orchestra">Speakers & Orchestra</option> <option value="Spiritual">Spiritual</option> <option value="String Ensemble">String Ensemble</option> <option value="String Quartet">String Quartet</option> <option value="String Quintet">String Quintet</option> <option value="String Sextet">String Sextet</option> <option value="String sonata">String sonata</option> <option value="String Trio">String Trio</option> <option value="Suite">Suite</option> <option value="Symphonic Dances">Symphonic Dances</option> <option value="Symphonic Poem">Symphonic Poem</option> <option value="Symphony">Symphony</option> <option value="Synthesizer">Synthesizer</option> <option value="Tango">Tango</option> <option value="Theater">Theater</option> <option value="Theatre Piece">Theatre Piece</option> <option value="Theme and Variations">Theme and Variations</option> <option value="Theorbo">Theorbo</option> <option value="Timpani">Timpani</option> <option value="Tone poem">Tone poem</option> <option value="Traditional Folk">Traditional Folk</option> <option value="Transcription">Transcription</option> <option value="Trio">Trio</option> <option value="Trio Sonata">Trio Sonata</option> <option value="Triple Concerto">Triple Concerto</option> <option value="Trombone Concerto">Trombone Concerto</option> <option value="Troubadour Music">Troubadour Music</option> <option value="Trumpet">Trumpet</option> <option value="Trumpet & Orchestra">Trumpet & Orchestra</option> <option value="Trumpet and Orchestr">Trumpet and Orchestr</option> <option value="Trumpet Concerto">Trumpet Concerto</option> <option value="Tuba Concerto">Tuba Concerto</option> <option value="Two Violin Sonata">Two Violin Sonata</option> <option value="Typewriter & Orchest">Typewriter & Orchest</option> <option value="Verbunkos">Verbunkos</option> <option value="Vihuela">Vihuela</option> <option value="Villancico">Villancico</option> <option value="Viola">Viola</option> <option value="Viola and Orchestra">Viola and Orchestra</option> <option value="Viola Concerto">Viola Concerto</option> <option value="Viola da gamba">Viola da gamba</option> <option value="Viola Sonata">Viola Sonata</option> <option value="Viola Trio">Viola Trio</option> <option value="Violin">Violin</option> <option value="Violin & Harpsichord">Violin & Harpsichord</option> <option value="Violin & Strings">Violin & Strings</option> <option value="Violin and Orchestra">Violin and Orchestra</option> <option value="Violin and Piano">Violin and Piano</option> <option value="Violin Concerto">Violin Concerto</option> <option value="Violin Sonata">Violin Sonata</option> <option value="Violins - Two">Violins - Two</option> <option value="Violoncello concert">Violoncello concert</option> <option value="Vocal">Vocal</option> <option value="Vocal ensemble">Vocal ensemble</option> <option value="Vocal Quartet">Vocal Quartet</option> <option value="Voice and Orchestra">Voice and Orchestra</option> <option value="Voice and Piano">Voice and Piano</option> <option value="Voice and Viola">Voice and Viola</option> <option value="Voices and Orchestra">Voices and Orchestra</option> <option value="Voices and Piano">Voices and Piano</option> <option value="Waltz">Waltz</option> <option value="Welcome song">Welcome song</option> <option value="Wind ensemble">Wind ensemble</option> <option value="Wind Quintet">Wind Quintet</option> <option value="Winds & Percussion">Winds & Percussion</option> <option value="Zarzuela">Zarzuela</option>');
     }

     else if ($(this).val() == "Comedy" ) {
       $("#secondaryGenre").empty().append('<option value="Comedy">Comedy</option>');
     }

     else if ($(this).val() == "Country" ) {
       $("#secondaryGenre").empty().append('<option value="Alt. Country">Alt. Country</option> <option value="Americana">Americana</option> <option value="Bluegrass">Bluegrass</option> <option value="Country">Country</option> <option value="Country (Contemporary)">Country (Contemporary)</option> <option value="Country (Traditional)">Country (Traditional)</option> <option value="Country Rock">Country Rock</option>');
     }

     else if ($(this).val() == "Easy Listening" ) {
       $("#secondaryGenre").empty().append('<option value="Acoustic">Acoustic</option> <option value="Chillout">Chillout</option> <option value="Easy Listening">Easy Listening</option>');
     }

     else if ($(this).val() == "Educational" ) {
       $("#secondaryGenre").empty().append('<option value="Educational">Educational</option>');
     }

     else if ($(this).val() == "Electronic" ) {
       $("#secondaryGenre").empty().append('<option value="2 Step">2 Step</option> <option value="Acapella">Acapella</option> <option value="Acid House">Acid House</option> <option value="Afro House">Afro House</option> <option value="Ambient">Ambient</option> <option value="Baile">Baile</option> <option value="Bass House">Bass House</option> <option value="Bassline">Bassline</option> <option value="Beats & Breaks">Beats & Breaks</option> <option value="Big Room">Big Room</option> <option value="Blip Blap">Blip Blap</option> <option value="Blog House">Blog House</option> <option value="Breakbeat">Breakbeat</option> <option value="Breaks">Breaks</option> <option value="Broken Beat">Broken Beat</option> <option value="Chillout">Chillout</option> <option value="Dance">Dance</option> <option value="Deep House">Deep House</option> <option value="Disco">Disco</option> <option value="DJ Tool">DJ Tool</option> <option value="Downtempo">Downtempo</option> <option value="Drone">Drone</option> <option value="Drum & Bass">Drum & Bass</option> <option value="Dub Techno">Dub Techno</option> <option value="Dubstep">Dubstep</option> <option value="Electro">Electro</option> <option value="Electro House">Electro House</option> <option value="Electronic">Electronic</option> <option value="Electronic Lounge">Electronic Lounge</option> <option value="Electronica">Electronica</option> <option value="Experimental">Experimental</option> <option value="Fidget House">Fidget House</option> <option value="Fidget House">Fidget House</option> <option value="Footwork">Footwork</option> <option value="Funky">Funky</option> <option value="Funky Breaks">Funky Breaks</option> <option value="Funky House">Funky House</option> <option value="Future House">Future House</option> <option value="Garage">Garage</option> <option value="Glitch">Glitch</option> <option value="Glitch hop">Glitch hop</option> <option value="Grime">Grime</option> <option value="Halftime">Halftime</option> <option value="Happy Hardcore">Happy Hardcore</option> <option value="Hard House">Hard House</option> <option value="Hard Techno">Hard Techno</option> <option value="Hardcore">Hardcore</option> <option value="House">House</option> <option value="Indie Dance">Indie Dance</option> <option value="Jackin House">Jackin House</option> <option value="Juke">Juke</option> <option value="Lazer Bass">Lazer Bass</option> <option value="Leftfield/IDM">Leftfield/IDM</option> <option value="Mashup">Mashup</option> <option value="Melodic House & Techno">Melodic House & Techno</option> <option value="Miami Bass">Miami Bass</option> <option value="Minimal">Minimal</option> <option value="Minimal Techno">Minimal Techno</option> <option value="Noise">Noise</option> <option value="Nu Disco">Nu Disco</option> <option value="Nu Skool Breaks">Nu Skool Breaks</option> <option value="Nujazz">Nujazz</option> <option value="Organic House / Downtempo">Organic House / Downtempo</option> <option value="Pop Dance">Pop Dance</option> <option value="Post-dubstep">Post-dubstep</option> <option value="Progressive Breaks">Progressive Breaks</option> <option value="Progressive House">Progressive House</option> <option value="Progressive Trance">Progressive Trance</option> <option value="Psy Trance">Psy Trance</option> <option value="Skweee">Skweee</option> <option value="Soulful House">Soulful House</option> <option value="Synthwave">Synthwave</option> <option value="Tech House">Tech House</option> <option value="Techno">Techno</option> <option value="Techno (Peak Time / Driving)">Techno (Peak Time / Driving)</option> <option value="Techno (Raw / Deep / Hypnotic)">Techno (Raw / Deep / Hypnotic)</option> <option value="Trance">Trance</option> <option value="Tribal House">Tribal House</option> <option value="Trip Hop">Trip Hop</option> <option value="UK Funky">UK Funky</option> <option value="UK Hardcore">UK Hardcore</option> <option value="Wonky">Wonky</option>');
     }

     else if ($(this).val() == "Fitness & Workout" ) {
       $("#secondaryGenre").empty().append('<option value="New Age">New Age</option> <option value="Self Help">Self Help</option> <option value="Yoga">Yoga</option>');
     }

     else if ($(this).val() == "Folk" ) {
       $("#secondaryGenre").empty().append('<option value="Cajun/Zydeco">Cajun/Zydeco</option> <option value="Folk">Folk</option> <option value="Folk (Singer/Songwriter)">Folk (Singer/Songwriter)</option> <option value="Singer / Songwriter">Singer / Songwriter</option> <option value="Specialty">Specialty</option>');
     }

     else if ($(this).val() == "HipHop/Rap" ) {
       $("#secondaryGenre").empty().append('<option value="Crunk">Crunk</option> <option value="Dirty South">Dirty South</option> <option value="East Coast Rap">East Coast Rap</option> <option value="Gangsta Rap">Gangsta Rap</option> <option value="Hip-Hop">Hip-Hop</option> <option value="International Rap/Hip-Hop">International Rap/Hip-Hop</option> <option value="Old School Rap">Old School Rap</option> <option value="Pop Rap/Hip-Hop">Pop Rap/Hip-Hop</option> <option value="R & B/Soul">R & B/Soul</option> <option value="R&B/Hip-Hop">R&B/Hip-Hop</option> <option value="Rap">Rap</option> <option value="Turntablism">Turntablism</option> <option value="West Coast Rap">West Coast Rap</option>');
     }

     else if ($(this).val() == "Holiday Music" ) {
       $("#secondaryGenre").empty().append('<option value="Christmas">Christmas</option> <option value="Holiday">Holiday</option> <option value="Holiday Music">Holiday Music</option>');
     }

     else if ($(this).val() == "Indian" ) {
       $("#secondaryGenre").empty().append('<option value="Bhangda">Bhangda</option> <option value="Indian Classical">Indian Classical</option>');
     }

     else if ($(this).val() == "Industrial" ) {
       $("#secondaryGenre").empty().append('<option value="Industrial">Industrial</option>');
     }

     else if ($(this).val() == "Inspirational" ) {
       $("#secondaryGenre").empty().append('<option value="Devotional & Spiritual">Devotional & Spiritual</option> <option value="Inspirational">Inspirational</option> <option value="Self Help">Self Help</option>');
     }

     else if ($(this).val() == "Instructional" ) {
       $("#secondaryGenre").empty().append('<option value="Instructional">Instructional</option>');
     }

     else if ($(this).val() == "Jazz" ) {
       $("#secondaryGenre").empty().append('<option value="Acid Jazz">Acid Jazz</option> <option value="Avant Garde">Avant Garde</option> <option value="Bebop">Bebop</option> <option value="Big Band">Big Band</option> <option value="Boogaloo">Boogaloo</option> <option value="Bossa Nova">Bossa Nova</option> <option value="Brazilian Jazz">Brazilian Jazz</option> <option value="Compilations">Compilations</option> <option value="Cool Jazz">Cool Jazz</option> <option value="Free Jazz">Free Jazz</option> <option value="General">General</option> <option value="Jazz">Jazz</option> <option value="Jazz (Contemporary)">Jazz (Contemporary)</option> <option value="Jazz (Traditional)">Jazz (Traditional)</option> <option value="Jazz Fusion">Jazz Fusion</option> <option value="Latin Jazz">Latin Jazz</option> <option value="Live Recordings">Live Recordings</option> <option value="Modern Postbebop">Modern Postbebop</option> <option value="New Orleans Jazz">New Orleans Jazz</option> <option value="Ragtime">Ragtime</option> <option value="Smooth Jazz">Smooth Jazz</option> <option value="Soul-Jazz">Soul-Jazz</option> <option value="Standards">Standards</option> <option value="Swing">Swing</option> <option value="Swing Jazz">Swing Jazz</option> <option value="Traditional Jazz">Traditional Jazz</option> <option value="Vocal Jazz">Vocal Jazz</option>');
     }

     else if ($(this).val() == "Karaoke" ) {
       $("#secondaryGenre").empty().append('<option value="Karaoke">Karaoke</option>');
     }

     else if ($(this).val() == "Latin" ) {
       $("#secondaryGenre").empty().append('<option value="Alternativo & Rock Latino">Alternativo & Rock Latino</option> <option value="Ax">Ax</option> <option value="AxT">AxT</option> <option value="Bacheta">Bacheta</option> <option value="Baladas y Boleros">Baladas y Boleros</option> <option value="Choro">Choro</option> <option value="Contemporary Latin">Contemporary Latin</option> <option value="Flamenco">Flamenco</option> <option value="Forr">Forr</option> <option value="Forr=">Forr=</option> <option value="Frevo">Frevo</option> <option value="Latin">Latin</option> <option value="Latin / Regional Mexican">Latin / Regional Mexican</option> <option value="Latin / Urban">Latin / Urban</option> <option value="Latin Pop">Latin Pop</option> <option value="Latin Rock">Latin Rock</option> <option value="Latin Tropical">Latin Tropical</option> <option value="Latin TV">Latin TV</option> <option value="Latin Urban / Reggaeton">Latin Urban / Reggaeton</option> <option value="Latino TV">Latino TV</option> <option value="Mambo">Mambo</option> <option value="Mariachi">Mariachi</option> <option value="Mexican">Mexican</option> <option value="MPB">MPB</option> <option value="Pop Latino">Pop Latino</option> <option value="Rafces">Rafces</option> <option value="Ranchera, Merengue">Ranchera, Merengue</option> <option value="Reggaeton y Hip-Hop">Reggaeton y Hip-Hop</option> <option value="Regional Mexicano">Regional Mexicano</option> <option value="Salsa">Salsa</option> <option value="Salsa y Tropical">Salsa y Tropical</option> <option value="Samba">Samba</option> <option value="Sertanejo">Sertanejo</option> <option value="Tango">Tango</option> <option value="Urban Latino">Urban Latino</option>');
     }

     else if ($(this).val() == "Motown" ) {
       $("#secondaryGenre").empty().append('<option value="Motown">Motown</option>');
     }

     else if ($(this).val() == "Oldies" ) {
       $("#secondaryGenre").empty().append('<option value="50">50</option> <option value="60">60</option> <option value="70">70</option> <option value="80">80</option> <option value="Classic Lounge">Classic Lounge</option> <option value="Oldies">Oldies</option> <option value="Standards & Showtunes">Standards & Showtunes</option>');
     }

     else if ($(this).val() == "Pop" ) {
       $("#secondaryGenre").empty().append('<option value="Brit Pop">Brit Pop</option> <option value="Electropop">Electropop</option> <option value="French Pop">French Pop</option> <option value="Instrumental">Instrumental</option> <option value="Musique Francophone">Musique Francophone</option> <option value="Pop">Pop</option> <option value="Pop (Singer / Songwriter)">Pop (Singer / Songwriter)</option> <option value="Under World">Under World</option> <option value="Vocal">Vocal</option>');
     }

     else if ($(this).val() == "R&B/Soul" ) {
       $("#secondaryGenre").empty().append('<option value="Classic Soul">Classic Soul</option> <option value="Funk">Funk</option> <option value="New Soul">New Soul</option> <option value="R&B">R&B</option> <option value="R&B/Soul">R&B/Soul</option> <option value="Soul">Soul</option>');
     }

     else if ($(this).val() == "Reggae" ) {
       $("#secondaryGenre").empty().append('<option value="Dancehall">Dancehall</option> <option value="Dub">Dub</option> <option value="Ragga">Ragga</option> <option value="Reggae">Reggae</option> <option value="Reggaeton">Reggaeton</option> <option value="Roots">Roots</option> <option value="Ska">Ska</option>');
     }

     else if ($(this).val() == "Rock" ) {
       $("#secondaryGenre").empty().append('<option value="Acoustic">Acoustic</option> <option value="Alternative">Alternative</option> <option value="Alternative Experimental">Alternative Experimental</option> <option value="Art Punk">Art Punk</option> <option value="Art Rock">Art Rock</option> <option value="Black Metal">Black Metal</option> <option value="Classic Rock">Classic Rock</option> <option value="Dance-Rock">Dance-Rock</option> <option value="Death Metal">Death Metal</option> <option value="Drone">Drone</option> <option value="Electro Punk">Electro Punk</option> <option value="Electro Rock">Electro Rock</option> <option value="EMO">EMO</option> <option value="Garage Rock">Garage Rock</option> <option value="Glam Rock">Glam Rock</option> <option value="Goth">Goth</option> <option value="Grindcore">Grindcore</option> <option value="Groove Tech">Groove Tech</option> <option value="Grunge">Grunge</option> <option value="Grungecore">Grungecore</option> <option value="Gypsy Punk">Gypsy Punk</option> <option value="Hard House">Hard House</option> <option value="Hard Rock">Hard Rock</option> <option value="Hardcore">Hardcore</option> <option value="Heavy Metal">Heavy Metal</option> <option value="Indie Rock">Indie Rock</option> <option value="Jam Rock">Jam Rock</option> <option value="Krautrock">Krautrock</option> <option value="Lo-Fi">Lo-Fi</option> <option value="Math Rock">Math Rock</option> <option value="Mathcore">Mathcore</option> <option value="Metal">Metal</option> <option value="Metalcore">Metalcore</option> <option value="New Wave">New Wave</option> <option value="Nintendocore">Nintendocore</option> <option value="Noise Rock">Noise Rock</option> <option value="Nu Metal">Nu Metal</option> <option value="Oi!">Oi!</option> <option value="Pop Punk">Pop Punk</option> <option value="Pop Rock">Pop Rock</option> <option value="Post Punk">Post Punk</option> <option value="Prog Rock">Prog Rock</option> <option value="Psyche">Psyche</option> <option value="Punk">Punk</option> <option value="Rock">Rock</option> <option value="Rock (Singer/Songwriter)">Rock (Singer/Songwriter)</option> <option value="Rockabilly">Rockabilly</option> <option value="Screamo">Screamo</option> <option value="Shoegazing">Shoegazing</option> <option value="Stoner Metal">Stoner Metal</option> <option value="Surf">Surf</option> <option value="Thrash/Speedmetal">Thrash/Speedmetal</option>');
     }

     else if ($(this).val() == "Samba" ) {
       $("#secondaryGenre").empty().append('<option value="Pagode">Pagode</option><option value="Samba">Samba</option>');
     }

     else if ($(this).val() == "Soundtracks" ) {
       $("#secondaryGenre").empty().append('<option value="Action & Adventure">Action & Adventure</option> <option value="Animation">Animation</option> <option value="Classic TV">Classic TV</option> <option value="Classics">Classics</option> <option value="Concert Films">Concert Films</option> <option value="Documentary">Documentary</option> <option value="Drama">Drama</option> <option value="Film Scores">Film Scores</option> <option value="Horror">Horror</option> <option value="Independent">Independent</option> <option value="Kids">Kids</option> <option value="Kids & Family">Kids & Family</option> <option value="Latino TV">Latino TV</option> <option value="Music Documentaries">Music Documentaries</option> <option value="Music Feature Films">Music Feature Films</option> <option value="Musicals">Musicals</option> <option value="Nonfiction">Nonfiction</option> <option value="Reality TV">Reality TV</option> <option value="Romance">Romance</option> <option value="Sci-Fi & Fantasy">Sci-Fi & Fantasy</option> <option value="Short Films">Short Films</option> <option value="Soundtrack">Soundtrack</option> <option value="Soundtracks">Soundtracks</option> <option value="Special Effects">Special Effects</option> <option value="Sport">Sport</option> <option value="Sports">Sports</option> <option value="Teens">Teens</option> <option value="Thriller">Thriller</option> <option value="TV">TV</option> <option value="TV/Film">TV/Film</option> <option value="Urban">Urban</option> <option value="Western">Western</option>');
     }

     else if ($(this).val() == "Spoken Word" ) {
       $("#secondaryGenre").empty().append('<option value="Instructional">Instructional</option> <option value="Lecture">Lecture</option> <option value="Poetry">Poetry</option> <option value="Poetry Slam">Poetry Slam</option> <option value="Speeches">Speeches</option> <option value="Spoken Word">Spoken Word</option>');
     }

     else if ($(this).val() == "World" ) {
       $("#secondaryGenre").empty().append('<option value="African">African</option> <option value="Afro Beat">Afro Beat</option> <option value="Afro Pop">Afro Pop</option> <option value="Asian">Asian</option> <option value="Bhangra">Bhangra</option> <option value="Brazilian">Brazilian</option> <option value="Caribbean">Caribbean</option> <option value="Celtic">Celtic</option> <option value="Enka">Enka</option> <option value="Euro">Euro</option> <option value="European/Mediterranean">European/Mediterranean</option> <option value="Fado">Fado</option> <option value="French Pop">French Pop</option> <option value="German">German</option> <option value="German Folk">German Folk</option> <option value="German Pop">German Pop</option> <option value="Ghazal">Ghazal</option> <option value="India">India</option> <option value="Irish Traditional">Irish Traditional</option> ');
     }



   });
</script>
<script type="text/javascript">
$(document).on('click', 'ul li a', function (e) {
  e.preventDefault();
  var example1 = $(this).parent().parent().parent().parent().attr('id');
  console.log(example1);
  if(typeof example1 == 'undefined'){
    example1="Artist0";
  }
  var id_string = '#inp'+example1;
  var ul_string = '#ULinp'+example1;
  $(id_string).val($(this).text());
  $(ul_string).hide();
  $(ul_string).append('<input type="text" name="artist_link[]" style="display: none;" value="https://open.spotify.com/artist/'+ $(this).attr('id') +'">');
});
</script>
@endsection
