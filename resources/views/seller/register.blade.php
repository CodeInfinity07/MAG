@extends('layouts.seller')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Seller Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('seller.register') }}"  enctype="multipart/form-data">
                        @csrf
                        <h3 style=""> <br> Seller Information:</h3><br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="seller_name" type="text" class="form-control @error('seller_name') is-invalid @enderror" name="seller_name" value="{{ old('seller_name') }}" required autocomplete="seller_name" autofocus>
                                @error('seller_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><strong>Active</strong>&nbsp;{{ __( 'E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="seller_email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right"><strong>Whatapp</strong>&nbsp;{{ __( 'Number') }}</label>

                            <div class="col-md-6">
                                <input id="whatapp_no" placeholder="03123456789" type="text" class="form-control @error('whatapp_no') is-invalid @enderror" name="whatapp_no" value="{{ old('whatapp_no') }}" required autocomplete="whatapp_no">

                                @error('whatapp_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CNIC" class="col-md-4 col-form-label text-md-right"><strong>CNIC</strong>&nbsp;{{ __( 'Number') }}</label>

                            <div class="col-md-6">
                                <input id="CNIC" placeholder="1234512345671" type="text" class="form-control @error('CNIC') is-invalid @enderror" name="CNIC" value="{{ old('CNIC') }}" required autocomplete="CNIC">
                                <i>filetype (png,jpeg,jpg)</i>
                                @error('CNIC')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CNIC_copy" class="col-md-4 col-form-label text-md-right"><strong>CNIC</strong>&nbsp;{{ __( 'Photo Copy') }}</label>

                            <div class="col-md-6">
                                <input id="CNIC_copy" placeholder="Upload File here" type="file" class="form-control @error('CNIC_copy') is-invalid @enderror" name="CNIC_copy" value="{{ old('CNIC_copy') }}" required autocomplete="CNIC_copy">
                                <i>filetype (png,jpeg,jpg)</i>
                                @error('CNIC_copy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h3 style=""> <br>Shop Information</h3><br>
                        <div class="form-group row">
                            <label for="shop_name" class="col-md-4 col-form-label text-md-right"><strong>Shop</strong>&nbsp;{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="shop_name" type="text" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" value="{{ old('shop_name') }}" required autocomplete="shop_name" autofocus>

                                @error('shop_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shop_type" class="col-md-4 col-form-label text-md-right"><strong>Shop</strong>&nbsp;{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <input id="shop_type" type="text" class="form-control @error('shop_type') is-invalid @enderror" name="shop_type" value="{{ old('shop_type') }}" required autocomplete="shop_type" autofocus>

                                @error('shop_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shop_city" class="col-md-4 col-form-label text-md-right"><strong>Shop</strong>&nbsp;{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select name="shop_city" class="form-control" id="sel1">
                                    <option>--Select--</option>
                                    <option value="">2</option>
                                    <option>3</option>
                                    <option>4</option>
                                  </select>

                                @error('shop_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shop_place" class="col-md-4 col-form-label text-md-right"><strong>Shop</strong>&nbsp;{{ __('Place') }}</label>

                            <div class="col-md-6">
                                <select name="shop_place" class="form-control" id="sel1">
                                    <option>--Select--</option>
                                    <option value="">2</option>
                                    <option>3</option>
                                    <option>4</option>
                                  </select>

                                @error('shop_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shop_address" class="col-md-4 col-form-label text-md-right"><strong>Shop</strong>&nbsp;{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="shop_address" type="text" class="form-control @error('shop_address') is-invalid @enderror" name="shop_address" value="{{ old('shop_address') }}" required autocomplete="shop_address" autofocus>

                                @error('shop_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="shop_timing" class="col-md-4 col-form-label text-md-right"><strong>Shop</strong>&nbsp;{{ __('Opening & Closing Time') }}</label>

                            <div class="col-md-6">
                                <input id="shop_timing" type="text" class="form-control @error('shop_timing') is-invalid @enderror" name="shop_timing" value="{{ old('shop_timing') }}" required autocomplete="shop_timing" autofocus>

                                @error('shop_timing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="shop_image" class="col-md-4 col-form-label text-md-right"><strong>Shop</strong>&nbsp;{{ __('Front View') }}</label>

                            <div class="col-md-6">
                                <input id="shop_image" type="file" class="form-control @error('shop_image') is-invalid @enderror" name="shop_image" value="{{ old('shop_image') }}" required autocomplete="shop_image" autofocus>
                                <i>filetype (png,jpeg,jpg)</i>
                                @error('shop_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shop_proof" class="col-md-4 col-form-label text-md-right"><strong>Shop</strong>&nbsp;{{ __('Tested Document') }}</label>

                            <div class="col-md-6">
                                <input id="shop_proof" type="file" class="form-control @error('shop_proof') is-invalid @enderror" name="shop_proof" value="{{ old('shop_proof') }}" required autocomplete="shop_proof" autofocus>
                                <i>click <a data-toggle="modal" data-target="#shop_proof_model" href="#">here</a> for more info</i>
                                @error('shop_proof')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Model Starts --}}

                        <div class="modal fade" id="shop_proof_model" tabindex="-1" role="dialog" aria-labelledby="shop_proof_model" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="shop_proof_model">Shop Papers</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <strong>Shop Proof Documents</strong> means that the document or certificate of ownership 
                                  that is either on your Name or attested by the Owner as well as the nearest Police Station. <br><br>
                                  <Strong>-- FOR RENTAL PROPERITY</Strong><br>
                                  Upload the photo of the agreement between both parties.<br>
                                  <br><Strong>-- FOR OWNER PROPERITY</Strong><br>
                                  Upload the photo of the properity Papers.
                                  <img src="/img/Rental-Agreement-Format.png" alt="">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          {{-- Model end --}}
                        {{-- Opening && closing  time  --}}
                        {{-- <div class="form-inline">
                            <label class="my-1 mr-2">{{ ucfirst($day->name) }}: from</label>
                            <select class="custom-select my-1 mr-sm-2" name="from_hours[{{ $day->id }}]">
                                <option value="">--</option>
                                @foreach(range(0,23) as $hours)
                                    <option 
                                        value="{{ $hours < 10 ? "0$hours" : $hours }}"
                                        {{ old('from_hours.'.$day->id) == ($hours < 10 ? "0$hours" : $hours) ? 'selected' : '' }}
                                    >{{ $hours < 10 ? "0$hours" : $hours }}</option>
                                @endforeach
                            </select>
                            <label class="my-1 mr-2">:</label>
                            <select class="custom-select my-1 mr-sm-2" name="from_minutes[{{ $day->id }}]">
                                <option value="">--</option>
                                <option value="00" {{ old('from_minutes.'.$day->id) == '00' ? 'selected' : '' }}>00</option>
                                <option value="30" {{ old('from_minutes.'.$day->id) == '30' ? 'selected' : '' }}>30</option>
                            </select>
                            <label class="my-1 mr-2">to</label>
                            <select class="custom-select my-1 mr-sm-2" name="to_hours[{{ $day->id }}]">
                                <option value="">--</option>
                                @foreach(range(0,23) as $hours)
                                    <option 
                                        value="{{ $hours < 10 ? "0$hours" : $hours }}"
                                        {{ old('to_hours.'.$day->id) == ($hours < 10 ? "0$hours" : $hours) ? 'selected' : '' }}
                                    >{{ $hours < 10 ? "0$hours" : $hours }}</option>
                                @endforeach
                            </select>
                            <label class="my-1 mr-2">:</label>
                            <select class="custom-select my-1 mr-sm-2" name="to_minutes[{{ $day->id }}]">
                                <option value="">--</option>
                                <option value="00" {{ old('to_minutes.'.$day->id) == '00' ? 'selected' : '' }}>00</option>
                                <option value="30" {{ old('to_minutes.'.$day->id) == '30' ? 'selected' : '' }}>30</option>
                            </select>
                        </div> --}}


                        {{-- Opening && closing  time  --}}


                        <hr>
                        <h3 style=""> <br> Login Information</h3><br>
                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
