@extends('SellerViews.layouts.index')

@section('links')
    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <h3 class="mb-4" style="display:flex;align:center;">Product</h3>
                        <form name="myForm" action="{{route('seller.product.addProductPost')}}" method="post">
                            @csrf
                            {{-- Title name=title --}}
                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-left">{{ __('Title') }}<span class="text-danger">*</span></label>
    
                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Ex. Nikon Coolpix A300 Digital Camera...." value="{{ old('title') }}" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Categories name=category --}}

                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-left">{{ __('Category') }}<span class="text-danger">*</span></label>
    
                                <div class="col-md-4">
                                    <select id="category" type="text" data-dependent="child" class="form-control @error('category') is-invalid @enderror" onchange="get_subcategories(this.value);" placeholder="Select Category" value="{{ old('category') }}" required autocomplete="category" autofocus>
                                        <option value="">Choose..</option>
                                        @foreach ($categories as $category)
                                            @if ($category->parent_id==0)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                            
                                        @endforeach   
                                    
                                    </select>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <select id="childCategory" type="text" class="form-control @error('category') is-invalid @enderror" name="category" placeholder="Select Category" value="{{ old('title') }}" required autocomplete="childCategory" autofocus>
                                        
                                    
                                    </select>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Brand name=brand ; color name=color --}}

                            <div class="form-group row">
                                <label for="brand" class="col-md-2 col-form-label text-md-left">{{ __('Brand') }}<span class="text-danger">*</span></label>
    
                                <div class="col-md-4">
                                    <select id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" placeholder="Select Category" value="{{ old('brand') }}" required autocomplete="brand" autofocus>
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

                                <label for="color" class="col-md-1 col-form-label text-md-left">{{ __('Color') }}</label>

                                <div class="col-md-3">
                                    <select id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" placeholder="Select Category" value="{{ old('color') }}" required autocomplete="category" autofocus>
                                        <option value="" selected>Choose</option>
                                        <option value="Black">Black</option>
                                        <option value="Blue">Blue</option>
                                        <option value="White">White</option>
                                        <option value="Silver">Silver</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Gray">Gray</option>
                                        <option value="Brown">Brown</option>
                                        <option value="Pink">Pink</option>
                                        <option value="Purple">Purple</option>
                                        <option value="Violet">Violet</option>
                                        <option value="Green">Green</option>
                                        <option value="Red">Red</option>
                                        <option value="Yellow">Yellow</option>
                                        <option value="Orange">Orange</option>
                                        <option value="Indigo">Indigo</option>
                                    </select>
                                    @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Stock name=stock --}}

                            <div class="form-group row">
                                <label for="stock" class="col-md-2 col-form-label text-md-left">{{ __('stock') }}<span class="text-danger">*</span></label>
    
                                <div class="col-md-4">
                                    <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock"  value="{{ old('stock') }}" required autocomplete="stock" autofocus>
                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <input id="price" type="number" placeholder="price" class="form-control @error('price') is-invalid @enderror" name="price"  value="{{ old('price') }}" required autocomplete="price" autofocus>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>

                            {{-- Check Box --}}
                            <div class="form-group row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4">
                                    <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                        <input type="checkbox" class="css-control-input" id="stockcheck" onClick="javascript:mystock()"> <span class="css-control-indicator"></span>&nbsp;Add threshhold</label>
                                        <div id="stockdropdown" style="visibility:hidden">
                                            <input type='number' class="form-control" name='stockalert'>
                                        </div>
                                </div>

                                <div class=""></div>
                                <div class="col-lg-4">
                                    <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                        <input type="checkbox" class="css-control-input" id="pricecheck" onClick="javascript:myprice()"> <span class="css-control-indicator"></span>&nbsp;Add Special Price</label>
                                        <div id="pricedropdown" style="visibility:hidden">
                                            <input type='number' class="form-control" name='specialprice'>
                                        </div>
                                </div>
                            </div>


                            {{-- SKU  --}}

                            <div class="form-group row">
                                <label for="SKU" class="col-md-2 col-form-label text-md-left">{{ __('SKU') }}<span class="text-danger">*</span></label>
    
                                <div class="col-md-4">
                                    <input id="SKU" type="text" placeholder="SKU-" class="form-control @error('stock') is-invalid @enderror" name="SKU"  value="{{ old('SKU') }}" required autocomplete="SKU" autofocus>
                                    @error('SKU')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <input type="button"  value="Generate" class="btn btn-info" onclick="javascript:GenerateSKU();">
                                </div>
                                
                            </div>


                            {{-- Image Upload --}}
                            <div class="form-group row">
                                <label for="image" class="col-md-2 col-form-label text-md-left">{{ __('Image') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                        <input type="checkbox" class="css-control-input" id="gallery" onclick="javascript:Gallery()" name="image" > <span class="css-control-indicator" ></span>&nbsp;Choose from Gallery</label>
                                        <div id="gallerydropdown" style="visibility:hidden">
                                            <select  type="text" class="form-control @error('gsllery') is-invalid @enderror" name="gallery_image"  value="{{ old('gallery') }}" autocomplete="gallery" autofocus>
                                                <option value="" selected>Choose</option>
                                                @foreach ($images as $image)
                                                    <option value="{{$image->image}}">{{$image->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>

                                <div class=""></div>
                                <div class="col-lg-4">
                                    <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                        <input type="checkbox" class="css-control-input" id="fileinput" onclick="javascript:fileInput()"> <span class="css-control-indicator"></span>&nbsp;Upload Image</label>
                                        <div id="fileDropdown" style="visibility:hidden">
                                            <input type='file' class="form-control" name="input_image">
                                        </div>
                                </div>
                            </div>


                            {{-- Warranty & tags --}}

                            <div class="form-group row">
                                <label for="brand" class="col-md-2 col-form-label text-md-left">{{ __('Warrenty') }}<span class="text-danger">*</span></label>
    
                                <div class="col-md-4">
                                    <select id="warranty" type="text" class="form-control @error('warranty') is-invalid @enderror" name="warranty" placeholder="Select Category" value="{{ old('warranty') }}" required autocomplete="warrenty" autofocus>
                                        <option value="">Choose</option>    
                                        <option value="None">None</option>    
                                        <option value="2 Months">2 Months</option>    
                                        <option value="4 Months">4 Months</option>    
                                        <option value="6 Months">6 Months</option>    
                                        <option value="8 Months">8 Months</option>    
                                        <option value="10 Months">10 Months</option>    
                                        <option value="1 Year">1 Year</option>    
                                        <option value="2 Year">2 Year</option>    
                                        <option value="3 Year">3 Year</option>    
                                        <option value="4 Year">4 Year</option>    
                                        <option value="5 Year">5 Year</option>    
                                    
                                    </select>
                                    @error('warranty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <label for="color" class="col-md-2 col-form-label text-md-left">{{ __('Delivery Charges') }}</label>

                                <div class="col-md-2">
                                    <input type="number" name="delivery_charges" value="" class="form-control ">
                                    @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="val-email">Product Condition <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-4">
                                    <select name="product_condition" id="" class="form-control" required>
                                        <option value="" selected>Select</option>
                                        <option value="New">New</option>
                                        <option value="Second Hand">Second Hand</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="val-email">Tags <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-email" name="tags" placeholder="Camera , DSLR , High Quality Camera,.....">
                                </div>
                            </div>


                            {{-- Additional Attributes --}}



                            <div class="form-group row">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Attribute</th>
                                                <th>Value</th>
                                                <th><a href="javascript:void(0)" class="btn btn-outline-info add_Row rounded-circle"><i class="fa fa-plus mt-1"></i></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" name="attribute[]"></td>
                                                <td><input type="text" class="form-control" name="value[]"></td>
                                                <td><a href="javascript:void(0)" class="btn btn-outline-danger remove_row rounded-circle"><i class="fa fa-minus mt-1"></i></a></td>
                                            </tr>
                                        </tbody>
    
                                    </table>
                                </div>
    
                            </div>

                            <label class="col-lg-2 col-form-label" for="val-email">Description <span class="text-danger">*</span></label>

                            <textarea id="editor" name="description_product"></textarea>
                            @error('editor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            
                            
                            <div class="form-group row">
                                <div class="col-lg-12 ml-auto mt-4">
                                    <button type="submit"  class="btn btn-primary w-100">Upload Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection