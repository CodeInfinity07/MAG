@extends('admin.includes.master-new')
@section('title', 'Dashboard')
@section('stylesheet')
<link rel="stylesheet" href="{{asset('assets/css/audio.css')}}" type="text/css">

@endsection
@section('myScripts')
<script src="{{asset('assets/js/audio-page.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script>
        $(function () {
            $(document).ready(function () {
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                        $('.progress .progress-bar').removeClass('bg-success');
                        $('.progress .progress-bar').addClass('bg-danger');
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (xhr) {
                        console.log(xhr);
                        setTimeout(() => {
                            $('.progress .progress-bar').removeClass('bg-danger');
                            $('.progress .progress-bar').addClass('bg-success');
                        }, 750)
                        // console.log(xhr);
                        setTimeout(() => {
                            var percentage = '0';
                            $('.progress .progress-bar').css("width", percentage+'%', function() {
                                return $(this).attr("aria-valuenow", percentage) + "%";
                            })
                        }, 1500)
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        $('#invalid-feedback').text(xhr.responseJSON.errors.audiofile);
                    }
                });
            });
        });
    </script>

@endsection
@section('content')
<div class="main-content" style="background-color: #f8f7ff">
   @include('admin/includes/header-new')
   <form action="{{route('audio.store',$album->id)}}" id="fileUploadForm" method="post" enctype='multipart/form-data'>
      @csrf
      <div class="home-section-four pt-5">
         <div class="m-md-4">
            <div class="upload-audio-containner">
               <div class="card"
                  style="border-radius: 10px !important; width: 100%; margin: 1em 0 2em 0; background-color: white; box-shadow: none">
                  <div class="card-body d-flex justify-content-between align-items-center">
                     <div class="d-flex justify-content-center align-items-center fw-bolder">
                        <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Upload Audio</div>
                     </div>
                     <button type="button" class="btn" data-toggle="tooltip" data-placement="top"
                        title="Tooltip on top">
                        <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                           style="width: 30px;height: 30px"><i class="fa fa-question text-white"></i></div>
                     </button>
                  </div>
               </div>
               <div class="audio-containner">
                  <h1>We allow the following audio file types: </h1>
                  <p class="audio-containner__alowed-quality">High Quality WAV - 320kbps - 44.1khz</p>
                  <div class="audio-containner__drag-drop-section">
                     <p>Drag and drop Here</p>
                     <p>Or</p>
                     <p class="browse-btn">Browse File</p>
                     <input type="file" class="song-input" name="audiofile" id="audiofile" accept="audio/*" multiple>
                     <p>You can upload here wav file</p>
                  </div>
                  <div class="form-group mt-3">
                     <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                     </div>
                  </div>
                  <div class="audio-containner__uploads">
                      {{-- this is the div --}}
                  </div>
               </div>
               <!--save banner-->
               <div class="alert alert-danger" id="invalid-feedback">
               </div>
            </div>
         </div>
      </div>
    </form>
    <form action="{{route('saveAudio',$album->id)}}" method="get">
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
@endsection
