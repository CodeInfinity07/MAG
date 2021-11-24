@extends('admin.includes.master-new')
@section('title', 'Dashboard')
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('assets/css/upload-album.css')}}" type="text/css">
@endsection

@section('myScripts')
    <script src="{{asset('assets/js/uploadAlbum-page.js')}}"></script>
    <script>
      $("#delImage").click(function(){
        location.reload();
        });

    </script>
@endsection


@section('content')
    <div class="main-content" style="background-color: #f8f7ff">


        @include('admin/includes/header-new')
        <div class="home-section-four pt-5">
            <div class="m-md-4">
                <form action="{{route('artwork.store',$album->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="upload-album-containner">
                    <div class=""
                        style="border-radius: 10px !important; width: 100%; margin: 1em 0 2em 0; background-color: white; box-shadow: none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-center align-items-center fw-bolder">
                                <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Upload Album Artwork</div>
                            </div>
                            <button type="button" class="btn" data-toggle="tooltip" data-placement="top"
                                title="Tooltip on top">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fa fa-question text-white"></i></div>
                            </button>
                        </div>
                    </div>

                    <div class="album-containner">
                        <div class="album-containner__title">
                            <h5>Album Artwork</h5>
                        </div>

                        <div class="album-containner__group">
                            <div class="album-containner__uploaded">
                                <div class="album-containner__uploaded__img-containner">
                                    <img src="" alt="song" id="upImage" >
                                </div>
                                <div class="album-containner__uploaded__controls">
                                    <a style="cursor: pointer; color: red;" id="delImage" >Delete</a>
                                </div>
                            </div>
                            <div class="album-containner__not-uploaded">
                                <p>Drag and drop Here</p>
                                <p>Or</p>
                                <p class="browse-btn">Browse File</p>
                                <input type="file" class="songImg-input"  name="image" accept="image/*">
                            </div>

                            <div class="album-containner__recommandation">
                                Need some stock photos for your cover art? Check out our selection of <span> Image
                                    Databases</span> that
                                you
                                can use!
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('image'))
                      @foreach ($errors->all() as $error)
                          <div style="color:red;">{{ $error }}</div>
                      @endforeach
                    @endif

                    <div class="album-rules">
                        <div class="album-rules__should">
                            <h5>You Should Do</h5>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class=" fal fa-check"></i>
                                </div>
                                <p>3000px x 3000px</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-check"></i></div>
                                <p>Less than 25MB</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-check"></i></div>
                                <p>RGB Colour Space</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-check"></i></div>
                                <p>Professional quality, product relevant images</p>
                            </div>
                        </div>
                        <div class="album-rules__should-not">
                            <h5>You Should Not Do</h5>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-times"></i>
                                </div>
                                <p>Website URL</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-times"></i>
                                </div>
                                <p>Contact information (i.e. email address, phone number etc.)</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-times"></i>
                                </div>
                                <p>Pornographic images</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-times"></i>
                                </div>
                                <p>Pricing information</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-times"></i>
                                </div>
                                <p>Scan of a CD (must be retail ready artwork)</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-times"></i>
                                </div>
                                <p>Blurry or pixelated images</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-times"></i>
                                </div>
                                <p>Need some stock photos for your cover art? Check out our selection of Image Databases
                                    that you can use!</p>
                            </div>
                            <div class="album-rules__rule">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fal fa-times"></i>
                                </div>
                                <p>By uploading your Artwork to RouteNote, you acknowledge that you agree to RouteNote’s
                                    Terms and Conditions. Please be sure not to violate the copyright or privacy rights of
                                    others, learn more.</p>
                            </div>
                        </div>
                    </div>

                    <p class="album-agreement">By uploading your Artwork to RouteNote, you acknowledge that you agree to
                        RouteNote’s Terms and
                        Conditions. Please be sure not to violate the copyright or privacy rights of others, learn more</p>

                    <!--save banner-->
                    <div class="card mt-5" style="border-radius: 10px !important; width: 100%">
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
                </div>
                </form>
            </div>
        </div>
    </div>




@endsection
