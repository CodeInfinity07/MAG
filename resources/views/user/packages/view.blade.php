@extends('user.layouts.index')

@section('content')
    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>

    <style>
        @media(max-width:1200px) {
            .pricing-dollar {
                margin-left: -142px !important;
                font-size: 12px !important;
                font-weight: 700;
            }

            #label-price {
                font-size: 12px !important;
                margin-left: -143px !important;
            }

            .pricing-btn {
                padding: 8px 13px !important;
                font-size: 12px !important;
            }
        }

        @media(max-width:320px) {
            #label-price {

                font-size: 7px !important;

            }

            .pricing-dollar {
                font-size: 7px !important;

            }

        }

    </style>
    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <!-- <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> -->
                <a href="/" style="width: 100%;" class="navbar-brand navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <center><img src="{{ asset('/') }}pnglogo.png" style="width:141px;margin-top: -41px;"
                            class="img-responsive" alt="Thin Laptop"></center>
                </a>

                <!-- </button> -->

                <!-- lOGO TEXT HERE -->
                <!-- <a href="index.html" class="navbar-brand"><img src="pnglogo.png" style="width:300px;" class="img-responsive" alt="Thin Laptop"></a> -->
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="#home" class="smoothScroll">Home</a></li>
                                                       <li><a href="#feature" class="smoothScroll">Features</a></li>
                                                       <li><a href="#about" class="smoothScroll">About us</a></li>
                                                       <li><a href="#pricing" class="smoothScroll">Pricing</a></li>
                                                       <li><a href="#contact" class="smoothScroll">Contact</a></li>
                                                  </ul> -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="#">Say hello - <span>info@soft.co</span></a></li> -->
                    </ul>
            </div>

        </div>
    </section>


    <!-- FEATURE -->



    <!-- FEATURE -->


    <!-- ABOUT -->





    <!-- PRICING -->
    <section id="home" data-stellar-background-ratio="0.5" style="background-size: cover;">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Choose any plan</h1>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 artist_beatmake">
                    <div class="pricing-thumb" style="border-radius: 25px; background-color:rgba(238, 227, 227, 0.801);">
                        <div class="pricing-title">
                            <h2>Artist or Beatmaker</h2>
                        </div>
                        <div class="pricing-info">

                            <p>Unlimited Releases <i class="fa fa-check"></i></p>
                            <p>Barcodes & ISRCs <i class="fa fa-check"></i></p>
                            <p>Youtube & Monetisation <i class="fa fa-check"></i></p>
                            <p>Content ID revenue <i class="fa fa-check"></i></p>
                            <p>Chart Registration <i class="fa fa-check"></i></p>
                            <p>Vevo channel 19$/10000 Xof per video <i class="fa fa-check"></i></p>
                            <!-- <p>asa</p> -->



                        </div>
                        <!-- href="artist/register" -->
                        <div class="pricing-bottom" style="margin-top: 50px;">
                            <span class="pricing-dollar" style="    margin-left: -250px">$37/20000 XOF per Year</span>
                            <button style="background-color:rgb(184, 43, 43)" onclick="show_model()"
                                class="section-btn pricing-btn">Register now</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 select_artist_col">

                    <div class="pricing-thumb" id="select_artist"
                        style="{{ $errors->all() ? 'display:none;' : '' }}border-radius: 25px;background-color:rgba(238, 227, 227, 0.801);">
                        <div class="pricing-title">
                            <h2>Label</h2>
                        </div>
                        <div class="pricing-info">
                            <p>Unlimited Releases <i class="fa fa-check"></i></p>
                            <p>Barcodes & ISRCs <i class="fa fa-check"></i></p>
                            <p>Youtube & Monetisation <i class="fa fa-check"></i></p>
                            <p>Content ID revenue <i class="fa fa-check"></i></p>
                            <p>Chart Registration <i class="fa fa-check"></i></p>
                            <p>Vevo channel 19$/10000 Xof per artist per video <i class="fa fa-check"></i></p>
                            <div class="slidecontainer">
                                <input type="range" class="how-much-artist-range" min="1" max="20" value="2" class="slider"
                                    id="myRange">
                                <p>Artist: <span id="demo"></span></p>
                            </div>

                        </div>
                        <div class="pricing-bottom">
                            <form action="/label/register" method="post"></form>
                            <span id="label-price" style="margin-left:-250px;" class="pricing-dollar">$74/40.0000 XOF per
                                Year</span>
                            <a style="background-color:rgb(184, 43, 43)" href="label/register"
                                class="section-btn pricing-btn next-btn">Next</a>
                        </div>
                        <script>
                            var slider = document.getElementById("myRange");
                            var output = document.getElementById("demo");
                            // var price = document.getElementById("label-price");
                            var price = document.getElementById("label-price").innerHTML;
                            var price2 = parseInt(price.replace(/[^0-9.]/g, ""));
                            console.log(price2);

                            output.innerHTML = slider.value;

                            slider.oninput = function() {
                                output.innerHTML = this.value;
                                price2 = this.value * 37;
                                price3 = this.value * 20;
                                price2 = '$' + price2 + '/' + price3 + '.0000 XOF per Year';
                                document.getElementById("label-price").innerHTML = price2;
                            }

                        </script>
                    </div>
                    <div class="pricing-thumb" id="show_register"
                        style="{{ $errors->all() ? 'display:block;' : 'display:none;' }}border-radius: 25px;background-color:rgba(238, 227, 227, 0.801);">
                        <div class="pricing-title">
                            <h2>Register</h2>
                            @if (Session::has('error'))
                                <b class="text-danger">>{{ Session::get('error') }}</b>
                            @endif
                        </div>
                        <div class="pricing-info">
                            <form method="post" action="{{ url('register') }}">
                                {{ csrf_field() }}
                                <input class="how-much-artist" type="hidden" name="numbers">
                                <input type="hidden" name="email" value="{{ $email }}" />
                                <input type="hidden" name="role" value="3" />
                                <p>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Label Name</label>
                                    <input type="text" required name="name" class="form-control custom__form-control"
                                        id="exampleFormControlInput1" placeholder="Michael jackson">
                                    @error('name')
                                        <b class="text-danger">{{ $message }}</b>
                                    @enderror
                                </div>
                                </p>
                                <p>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">User Name</label>
                                    <input type="text" required name="username" class="form-control custom__form-control"
                                        id="exampleFormControlInput1">
                                    @error('username')
                                        <b class="text-danger">{{ $message }}</b>
                                    @enderror
                                </div>
                                </p>
                                {{-- <p>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">How many artist page do you need ?</label>
                                    <input type="number" value="1" required name="numbers"
                                        class="form-control custom__form-control" id="exampleFormControlInput1">
                                </div>
                                </p> --}}
                                <p>
                                <div class="form-group">
                                    <label for="country_label">Countrys Name</label>
                                    <select class="form-control" name="country" id="country_label">
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                </p>
                                <p>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Password</label>
                                    <input type="password" name="pass" required class="form-control custom__form-control"
                                        id="exampleFormControlInput1" placeholder="Password">
                                    @error('pass')
                                        <b class="text-danger">{{ $message }}</b>
                                    @enderror
                                </div>
                                </p>
                                <div class="form-group" style="text-align: left;">
                                    <div>
                                        <input type="checkbox" id="terms_condition" required />
                                        <label for="terms_condition">
                                            Agree to <a href="{{ route('term.conditions') }}"
                                                style="text-decoration: underline !important">terms and conditions ?</a>
                                        </label>
                                    </div>
                                </div>


                                <div class="pricing-bottom text-right" style="margin-bottom: 18px;">
                                    <button type="button" style="background-color:rgb(184, 43, 43);position:static"
                                        class="section-btn back-btn">Back</button>
                                    <button type="submit" style="background-color:rgb(184, 43, 43);position:static"
                                        class="section-btn pricing-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3 col-sm-12 col-12 col-lg-12">
                    <div class="section-title">
                        <h1 style="    margin-top: 34px;"><a href="{{ url('partnership') }}"
                                style="color: white;text-decoration: underline!important;">Apply for partnership</a></h1>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal show_option " style="display:none;background:#0000006b;" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Choose Artist or Beatmaker</h5>
                    <button type="button" class="close " onclick="hide_model()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="main-content" style="width: 80%;margin: auto;margin-top: 28px; margin-bottom: 93px;">
                    <div style="display: flex; align-items: center;  margin-bottom: 15px;">
                        <input type="radio" id="Artist_checkbox" value="artist" checked class="choose_artist_or_beatmaker"
                            name="choose_artist_or_beatmaker" style="    width: 24px; height: 24px;" />
                        <label for="Artist_checkbox" style="    margin-top: 6px;margin-left: 14px;">Artist</label>
                    </div>

                    <div style="display: flex; align-items: center;  margin-bottom: 15px;">
                        <input type="radio" id="beatmaker" value="beatmaker" class="choose_artist_or_beatmaker"
                            name="choose_artist_or_beatmaker" style="    width: 24px; height: 24px;" />
                        <label for="beatmaker" style="    margin-top: 6px;margin-left: 14px;">Beatmaker</label>
                    </div>
                    <div style="display: flex; align-items: center;  margin-bottom: 15px;float: right;">
                        <button style="background-color:rgb(184, 43, 43)" onclick="move_next_page()"
                            class="section-btn ">Register now</button>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        function show_model() {
            $(".show_option").show();
        }

        function hide_model() {
            $(".show_option").hide();

        }

        function move_next_page() {
            var page = $(".choose_artist_or_beatmaker:checked").val();
            // alert(page);
            if (page == 'artist') {
                window.location.href = "{{ url('artist/register') }}";
            } else {
                window.location.href = "{{ url('Beatmaker/register') }}";

            }
        }

    </script>
@endsection
