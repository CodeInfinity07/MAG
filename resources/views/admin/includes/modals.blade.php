<?php
use Illuminate\Support\Facades\Auth;

$first_name = 'muddasar';
$last_name = 'habib';
$role_id = Auth::user()->role_id;
$role_name = Auth::user()->get_role_name->role_name;
?>
<!-- edit model start -->
<div class="modal model_show " style="display:none;background:#0000006b;overflow-y: scroll;" tabindex="-1"
    role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">My Details</h5>
                <button type="button" class="close " onclick="hide_model()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <hr>

            <form method="post" action=" @if ($role_name=='Admin' ) {{ url('admin/update_profile') }} @else {{ url('account/update_profile') }} @endif" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="container padding__model">
                    <div class="row">
                        <div class="col-sm-12 margin_bottom">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <label for="username" class="label_style">Username</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" value="{{ Auth::user()->username }}" required
                                            name="username" id="username" class="form-control"
                                            style="    border-radius: 4px;background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 margin_bottom">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <label for="email" class="label_style">Email</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="email" required name="email" id="email"
                                            value="{{ Auth::user()->email }}" class="form-control"
                                            style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 margin_bottom">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <label for="fname" class="label_style">First Name</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="fname" value="{{ Auth::user()->first_name }}"
                                            id="fname" class="form-control"
                                            style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 margin_bottom">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <label for="lname" class="label_style">Last Name</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="lname" value="{{ Auth::user()->last_name }}"
                                            id="lname" class="form-control"
                                            style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 margin_bottom">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <label for="photo" class="label_style">Update Photo</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <label for="img" class="no_img_btn" style="width: 100%;">Change</label>
                                                <input type="file" class="change_image" name="img" id="img"
                                                    style="display: none;" />
                                                <input type="hidden" name="old_img"
                                                    value="{{ Auth::user()->picture }}" />
                                            </div>
                                        </div>

                                    </div>
                                    <div id="selectedImg_div" style="display:none;postion:relative">
                                        <img id="selectedImg"
                                            style="width: 100px;height:100px;border-radius:50%;object-fit:cover;">
                                        <span>x</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 margin_bottom">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <label for="payment_method" class="label_style">Payment Method</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" name="payment_method"
                                            style="border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;">
                                            <option value="">Select Payment Method</option>
                                            <option value="Paypal"
                                                {{ Auth::user()->payment_method == 'Paypal' ? 'selected' : '' }}>
                                                Paypal</option>
                                            <option value="Orange Money"
                                                {{ Auth::user()->payment_method == 'Orange Money' ? 'selected' : '' }}>
                                                Orange Money</option>
                                        </select>
                                    </div>
                                    <div id="selectedImg_div" style="display:none;postion:relative">
                                        <img id="selectedImg"
                                            style="width: 100px;height:100px;border-radius:50%;object-fit:cover;">
                                        <span>x</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 margin_bottom">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <label for="pass" class="label_style">Password</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="password" name="pass" id="pass" class="form-control"
                                            placeholder="********"
                                            style="border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                        <div class="first_pass_error" style="color: red;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 margin_bottom">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <label for="c_pass" class="label_style">Confirm password</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="password" name="c_pass" id="c_pass" class="form-control"
                                            style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                        <div class="confirm_pass_error" style="color: red;"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 margin_bottom">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <label for="tPhone" class="label_style">Telephone</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="number" value="{{ Auth::user()->contact_no }}" name="tPhone"
                                            id="tPhone" class="form-control"
                                            style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 margin_bottom">
                            <div>
                                <button type="submit" class="update_btn">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="cancel_btn" type="reset" onclick="hide_model()">Cancel</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- edit model END -->

<!-- add artist name -->
{{-- <div class="modal add_artist_show" style="display:none;background:#0000006b;overflow-y: scroll;" tabindex="-1"
    role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Artist</h5>
                <button type="button" class="close " onclick="add_artist_close()" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <hr>
            @if (Auth::user()->role_id == 3)
                <form method="post" action="{{ url('add_artist') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="container padding__model">
                        <div class="row">
                            <?php
// $number = 1;
// for ($i = 0; $i < Auth::user()->artist_many; $i++) {
//   if (count(Auth::user()->get_artist) > $i) {
?>

                                <div class="col-sm-12 margin_bottom">
                                    <div class="row">
                                        <div class="col-sm-4 ">
                                            <label for="update_artist{{ $i }}"
                                                class="label_style">Update
                                                Artist({{ $number++ }})</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text"
                                                    value="{{ Auth::user()->get_artist[$i]->name }}"
                                                    name="update[]" id="add_artist{{ $i }}"
                                                    class="form-control {{ Auth::user()->get_artist[$i]->updated_at != '' ? 'update_artist' : '' }}"
                                                    style="border-radius: 4px;background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::user()->get_artist[$i]->updated_at == '')
                                    <input type="hidden" name="update_id[]"
                                        value="{{ Auth::user()->get_artist[$i]->id }}" />
                                @endif
                                <?php
//} else {
?>

                                <div class="col-sm-12 margin_bottom">
                                    <div class="row">
                                        <div class="col-sm-4 ">
                                            <label for="add_artist{{ $i }}" class="label_style">Add
                                                Artist ({{ $number++ }})</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                @if ($i == 0)
                                                    <input type="text" required name="add_artist[]"
                                                        id="add_artist{{ $i }}" class="form-control"
                                                        style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                                @else
                                                    <input type="text" name="add_artist[]"
                                                        id="add_artist{{ $i }}" class="form-control"
                                                        style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
//}
// }
?>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                <div class="col-sm-12 margin_bottom">
                                    <div>
                                        <button type="submit" class="Save_btn">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button class="cancel_btn" type="reset"
                                            onclick="add_artist_close()">Cancel</button>

                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
                @else
                <form method="post" action="{{ url('update_Artist_name') }}">
                    {{ csrf_field() }}
                    <div class="col-sm-12 margin_bottom">
                        <div class="row">
                            <div class="col-sm-4 ">
                                <label for="save_artist" class="label_style">Add Artist</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">

                                    <input type="text" value="{{ Auth::user()->name }}" required
                                        name="save_artist" id="save_artist" class="form-control"
                                        style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 margin_bottom" style="padding-bottom: 35px;padding-top: 16px;">
                        <div>
                            <button type="submit" class="Save_btn">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="cancel_btn" type="reset" onclick="add_artist_close()">Cancel</button>

                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div> --}}
@if (Auth::user()->role_id == 5)
    {{-- <h1 style="position: absolute;z-index:1000;"> @php echo Auth::user()->get_accounts->labels->count() @endphp</h1> --}}
    @foreach (Auth::user()->account->labels as $label)
        <div class="modal add_artist_show{{ $label->id }}"
            style="display:none;background:#0000006b;overflow-y: scroll;" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Artist</h5>
                        <button type="button" class="close " onclick="add_artist_close({{ $label->id }})"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <hr>
                    <form method="post" action="{{ route('add_update_artists_name') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="container padding__model">
                            <div class="row">
                                <?php
                                $number = 1;
                                for ($i = 0; $i < $label->artist_many; $i++) {
                                    if (count($label->artists) > $i) { ?>

                                    <div class="col-sm-12 margin_bottom">
                                        <div class="row">
                                            <div class="col-sm-4 ">
                                                <label for="update_artist{{ $i }}"
                                                    class="label_style">Update
                                                    Artist({{ $number++ }})</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" value="{{ $label->artists[$i]->name }}"
                                                        name="update[]" id="update_artist{{ $i }}"
                                                        class="form-control {{ $label->artists[$i]->name != '' ? 'update_artist' : '' }}"
                                                        style="border-radius: 4px;background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($label->artists[$i]->name == '')
                                        <input type="hidden" name="update_id[]"
                                            value="{{ $label->artists[$i]->id }}" />
                                    @endif
                                    <?php } else { ?>

                                    <div class="col-sm-12 margin_bottom">
                                        <div class="row">
                                            <div class="col-sm-4 ">
                                                <label for="add_artist{{ $i }}" class="label_style">Add
                                                    Artist ({{ $number++ }})</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    @if ($i == 0)
                                                        <input type="text" required name="add_artist[]"
                                                            id="add_artist{{ $i }}" class="form-control"
                                                            style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                                    @else
                                                        <input type="text" name="add_artist[]"
                                                            id="add_artist{{ $i }}" class="form-control"
                                                            style="    border-radius: 4px;    background: #dcdcdc1c;border: 2px solid #dcdcdc45;" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }
                                    }
                                    ?>
                                    <input type="hidden" name="label_id" value="{{ $label->id }}" />
                                    <div class="col-sm-12 margin_bottom">
                                        <div>
                                            <button type="submit" class="Save_btn">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="cancel_btn" type="reset"
                                                onclick="add_artist_close({{ $label->id }})">Cancel</button>

                                        </div>
                                    </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach
@endif
<!--//add artist name---->
<!-- Announcements -->
<div class="modal show_Announcements_model " style="display:none;background:#0000006b;overflow-y: scroll;" tabindex="-1"
    role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Announcements</h5>
                <button type="button" class="close " onclick="Announcements_close()" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <hr>

        </div>
    </div>
</div>
