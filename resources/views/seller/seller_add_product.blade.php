@extends('seller.layout.index')
@include('seller.models.category')
@include('seller.models.brand')
@section('css')
    <style>
        .tags-wrapper {
            background: white;
            overflow: hidden;
            width: 300px;
            color: aliceblue;
            border: 1px solid rgba(160, 154, 154, 0.829);
            background-image: -webkit-linear-gradient(top, rgb(238, 238, 238) 1%, white 15%);
            /* box-shadow: 0 0 5px rgba(0, 0, 0, .3); */
        }

        .tags-wrapper ul {
            margin: 0px;
            padding: 0px;
        }

        .tags-wrapper li {
            float: left;
        }

        .tags-wrapper li.tag {
            font-family: verdana;
            font-size: 11px;

            border-radius: 3px;
            list-style: none;
            background-clip: padding-box;
            background-color: rgb(228, 228, 228);
            background-image: -webkit-linear-gradient(top, rgb(244, 244, 244) 20%, rgb(240, 240, 240) 50%, rgb(232, 232, 232) 52%, rgb(238, 238, 238) 100%);
            box-shadow: 0 0 2px white inset, 0 1px 0 rgba(0, 0, 0, 0.05);
            color: rgb(51, 51, 51);
            border: 1px solid rgb(170, 170, 170);
            line-height: 13px;
            padding: 1px 3px 3px 5px;
            margin: 3px 0 3px 5px;
        }

        .tags-wrapper li a {
            text-decoration: none;
            color: white;
            padding: 2px;
            display: inline-block;
            margin-left: 6px;
            color: rgb(51, 51, 51);
        }

        .tags-wrapper li a:hover {
            color: #222;
        }

        .tags-wrapper input {
            display: none;
        }

        .tags-wrapper li.tags-input {
            white-space: nowrap;
            margin: 0;
            padding: 0;
        }

        .tags-wrapper li input {
            display: block;
            background: trasparent;
            outline: none;
            border: none;
            font-size: 11px;
            height: auto;
            width: 30px;
            margin: 4px;
        }

        .tags-wrapper .autofill-bg {
            position: relative;
            top: 4px;
        }

    </style>
@endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Add Product</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
               
            </div>
        </div>
      
    </div>
  
    <div class="row">
        <div class="col-12">
            @if(session()->has('confirmation'))
            <div class="alert alert-success">
                {{session('confirmation')}}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="container">
                    <form method="POST" action="{{route('add.product')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-1 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-11">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-1 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-3">
                                {{-- <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus> --}}
                                <select name="category" class="browser-default custom-select @error('category') is-invalid @enderror"  value="{{ old('category') }}" required autocomplete="category" autofocus>
                                    <option selected>--Select--</option>
                                         <?php foreach ($categories as $parent) {
                                                  if($parent->parent_id==0){?>
                                                    {{-- parent --}}
                                                  <option  disabled>{{$parent->name}}</option><?php
                            
                                                        foreach($categories as $child)
                                                        {
                                                            if($child->parent_id == $parent->id){?>
                                                                <option value="{{$child->id}}">&nbsp;&nbsp;&nbsp;{{$child->name}}</option><?php
                                                        }
                                                    }
                                                }
                                    } ?>
                                  </select>
                                  
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1">
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-success rounded-25 " style="margin-left: -20px"><i class="fa fa-plus mt-1"></i></a>
                            </div>

                            {{-- Brand --}}

                            <label for="brand" class="col-md-1 col-form-label text-md-right">{{ __('Brand') }}</label>

                            <div class="col-md-2">
                                {{-- <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus> --}}
                                <select name="brand" class="browser-default custom-select @error('brand') is-invalid @enderror"  value="{{ old('brand') }}" required autocomplete="brand" autofocus>
                                    <option selected>--Select--</option>
                                   @foreach ($brands as $brand)
                                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                                     
                                   @endforeach
                                    
                                  </select>
                                  
                                @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1">
                                <a href="#"data-toggle="modal" data-target="#brandModal" class="btn btn-outline-success rounded-25 " style="margin-left: -20px"><i class="fa fa-plus mt-1"></i></a>
                            </div>

                             {{-- Price --}}

                            <label for="price" class="col-md-1 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-2">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Rs/-</div>
                                    </div>
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                                </div>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                        </div>

                        {{-- Stock --}}
                        <div class="form-group row">
                            <label for="stock" class="col-md-1 col-form-label text-md-right">{{ __('Stock') }}</label>

                                <div class="col-md-3">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">item</div>
                                        </div>
                                    <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" required autocomplete="stock" autofocus>
                                    </div>
                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                            {{-- File upload --}}
                            <div class="col-md-3">
                                <div class="input-group mb-2">
                                    <input id="image" placeholder="Upload File here" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">
                                    {{-- <div class="custom-file">
                                    <input type="file" class="custom-file-input  @error('file') is-invalid @enderror"  value="{{ old('file') }}"  autocomplete="file" autofocus multiple>
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div> --}}
                                </div>
                            </div>


                            {{-- Tag --}}

                            
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text" data-toggle="tooltip" data-placement="top" title="Press <tab> to Insert">Tags:</div>
                                    </div>
                                <input type="text" id="testInput" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag') }}" autocomplete="tag" autofocus >
                                </div>
                                @error('tag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>
                        {{-- <div class="form-group">
                            <div class="input-group">
                                <label for="" class="form-label">SKU</label>
                               
                            </div>
                            <input type="text" class="form-control">
                        </div> --}}

                        {{-- Dynamic Input --}}

                        <div class="form-group row">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                            <th><a href="#" class="btn btn-outline-info add_Row rounded-circle"><i class="fa fa-plus mt-1"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" name="attribute[]"></td>
                                            <td><input type="text" class="form-control" name="value[]"></td>
                                            <td><a href="#" class="btn btn-outline-danger remove_row rounded-circle"><i class="fa fa-minus mt-1"></i></a></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>











                        {{-- Text Area --}}



                        <div class="form-group row">
                            <label for="stock" class="col-md- col-form-label text-md-right">{{ __('Description :') }}</label>

                                
                        </div>
                        <div class="col-sm-12 mb-4">
                            <textarea name="description" id="editor1" required></textarea>
                            @error('editor1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-success" value="Submit">

                    </form>



                            {{-- <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-2 mt-2 ml-2" for="email"><strong>
                                            Category:</strong></label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Must me less then 30 words" name="title" required>
                                    </div>
                                    <label class="control-label col-sm-1 mt-2" for="email"><strong> Brand:</strong></label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Must me less then 30 words" name="title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1 mt-2 ml-2" for="email"><strong>
                                            Price:</strong></label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Must me less then 30 words" name="title" required>
                                    </div>
                                    <label class="control-label col-sm-1 mt-2" for="email"><strong> Stock:</strong></label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Must me less then 30 words" name="title" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">
                                    <label for=""><strong>Images :</strong></label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="file" multiple>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Value</th>
                                            <th><a href="#" class="btn btn-info add_Row">+</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="attribute[]"></td>
                                            <td><input type="text" name="value[]"></td>
                                            <td><a href="#" class="btn btn-danger remove_row">-</a></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                           

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email"><strong> Description:</strong></label>
                                <div class="col-sm-12">
                                    <textarea name="" id="editor1"></textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email"><strong> Tags:</strong></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="testInput" />
                                    </div>
                                </div> --}}
                                
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("#testInput").tags({
                unique: true,
                maxTags: 5
            });
          

        });

    </script>
    <script>
        $('.add_Row').on('click', function() {
            addRow();
        });

        function addRow() {
            var tr =
                '<tr><td><input type="text" class="form-control" name="attribute[]"></td><td><input type="text" class="form-control" name="value[]"></td><td><a href="#" class="btn btn-outline-danger remove_row rounded-circle"> <i class="fa fa-minus mt-1"></i></a></td></tr>';
            $('tbody').append(tr);
        }
        $('tbody').on('click', '.remove_row', function() {
            $(this).parent().parent().remove();
        });

    </script>
    <script>
        CKEDITOR.replace('editor1');

    </script>

    <script>
        (function($) {
            $.fn.autofill = function(opts) {
                return this.each(function() {
                    var self = this,
                        usingTags = $(this).parent().hasClass("tags-wrapper");

                    if (!opts) opts = {};
                    // if were combined with tagging
                    if (usingTags) {
                        self = $(this).parent().find("li input");
                    }

                    // make this guy see through
                    $(self).css({
                        "background": "transparent",
                        "position": "absolute",
                        "z-index": 2,
                        "outline": "none"
                    });

                    // create the div wrapper
                    var $wrapper = $("<div class='autofill-wrapper'></div>").css("position", "relative");
                    // wrap
                    $(self).wrap($wrapper);
                    // reset wrapper cuz now its doc fragment?
                    $wrapper = $(self).parent();
                    // make the bg input
                    var color = opts.color || "rgba(214,215,220,1)";
                    var top = opts.top || -4;
                    var $bg = $("<input type='text' class='autofill-bg' disabled/>").css({
                        "color": color,
                        "top": top,
                        "outline": "none"
                    });



                    // set data
                    $bg.data("data", opts.data);

                    var bg = $bg[0];
                    // add classes
                    if (opts.classList) $bg.addClass(opts.classList);
                    // add the bg input (this not being absolute keeps the spacing)
                    $wrapper.append($bg);

                    // add listeners for data
                    if (opts.data) {

                        // we have to do this here because of tab
                        $(self).on("keydown", function(e) {
                            if (!!~[39, 13, 9].indexOf(e.keyCode)) {
                                e.preventDefault();
                                this.value = bg.value;
                                bg.value = "";
                            }
                        });

                        // keyup for letters
                        $(self).on("keyup", function(e) {
                            var found = 0,
                                rx, val = this.value;
                            if (val) {
                                opts.data.forEach(function(term) {
                                    rx = new RegExp("^" + val);
                                    if (rx.test(term)) {
                                        bg.value = term;
                                        found++;
                                    }
                                });

                                // if no matches
                                if (!found) bg.value = "";

                                // blank
                            } else {
                                bg.value = "";
                            }
                        });
                    }

                });
            }
        })(jQuery);

    </script>

    <script>
        (function($) {
            $.fn.tags = function(opts) {
                var selector = this.selector;
                //console.log("selector",selector);	
                // updates the original input					
                function update($original) {
                    var all = [];
                    var list = $original.closest(".tags-wrapper").find("li.tag span").each(function() {
                        all.push($(this).text());
                    });
                    all = all.join(",");
                    $original.val(all);
                }

                return this.each(function() {
                    var self = this,
                        $self = $(this),
                        $wrapper = $("<div class='tags-wrapper'><ul></ul></div");
                    tags = $self.val(),
                        tagsArray = tags.split(","),
                        $ul = $wrapper.find("ul");



                    // make sure have opts
                    if (!opts) opts = {};
                    opts.maxSize = 50;

                    // add tags to start
                    tagsArray.forEach(function(tag) {
                        if (tag) {
                            $ul.append("<li class='tag'><span>" + tag +
                                "</span><a href='#'>x</a></li>");
                        }
                    });


                    // get classes on this element
                    if (opts.classList) $wrapper.addClass(opts.classList);

                    // add input
                    $ul.append("<li class='tags-input'><input type='text' class='tags-secret'/></li>");
                    // set to dom
                    $self.after($wrapper);
                    // add the old element
                    $wrapper.append($self);

                    // size the text
                    var $input = $ul.find("input"),
                        size = parseInt($input.css("font-size")) - 4;

                    // delete a tag
                    $wrapper.on("click", "li.tag a", function(e) {
                        e.preventDefault();
                        $(this).closest("li").remove();
                        $self.trigger("tagRemove", $(this).closest("li").find("span").text());
                        update($self);
                    });

                    // backspace needs to check before keyup
                    $wrapper.on("keydown", "li input", function(e) {
                        // backspace
                        if (e.keyCode == 8 && !$input.val()) {
                            var $li = $ul.find("li.tag:last").remove();
                            update($self);
                            $self.trigger("tagRemove", $li.find("span").text());
                        }
                        // prevent for tab
                        if (e.keyCode == 9) {
                            e.preventDefault();
                        }

                    });

                    // as we type
                    $wrapper.on("keyup", "li input", function(e) {
                        e.preventDefault();
                        $ul = $wrapper.find("ul");
                        var $next = $input.next(),
                            usingAutoFill = $next.hasClass("autofill-bg"),
                            $inputLi = $ul.find("li.tags-input");

                        // regular size adjust
                        $input.width($input.val().length * (size));

                        // if combined with autofill, check the bg for size
                        if (usingAutoFill) {
                            $next.width($next.val().length * (size));
                            $input.width($next.val().length * (size));
                            // make sure autofill doesn't get too big
                            if ($next.width() < opts.maxSize) $next.width(opts.maxSize);
                            var list = $next.data().data;
                        }

                        // make sure we don't get too high
                        if ($input.width() < opts.maxSize) $input.width(opts.maxSize);

                        // tab, comma, enter
                        if (!!~[9, 188, 13].indexOf(e.keyCode)) {
                            var val = $input.val().replace(",", "");
                            var otherCheck = true;

                            // requring a tag to be in autofill
                            if (opts.requireData && usingAutoFill) {
                                if (!~list.indexOf(val)) {
                                    otherCheck = false;
                                    $input.val("");
                                }
                            }

                            // unique
                            if (opts.unique) {
                                // found a match already there
                                if (!!~$self.val().split(",").indexOf(val)) {
                                    otherCheck = false;
                                    $input.val("");
                                    $next.val("");
                                }
                            }

                            // max tags
                            if (opts.maxTags) {
                                if ($self.val().split(",").length == opts.maxTags) {
                                    otherCheck = false;
                                    $input.val("");
                                    $next.val("");
                                }
                            }

                            // if we have a value, and other checks pass, add the tag
                            if (val && otherCheck) {
                                // place the new tag
                                $inputLi.before("<li class='tag'><span>" + val +
                                    "</span><a href='#'>x</a></li>");
                                // clear the values
                                $input.val("");
                                if (usingAutoFill) $next.val("");
                                update($self);
                                $self.trigger("tagAdd", val);
                            }
                        }

                    });

                });
            }
        })(jQuery);

    </script>
@endsection
