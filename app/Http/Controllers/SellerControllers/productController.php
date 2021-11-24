<?php

namespace App\Http\Controllers\SellerControllers;

use App\Http\Controllers\Controller;
use App\Models\SellerModels\Brands;
use App\Models\SellerModels\Category;
use App\Models\SellerModels\Gallery;
use App\Models\SellerModels\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('SellerViews.product.view',compact('products'));
    }

    public function addProduct()
    {
        $categories = Category::all();
        $brands = Brands::all();
        $images = Gallery::all();
        return view('SellerViews.product.add',compact('categories','brands','images'));
    }
    public function addProductPost(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => ['required', 'string', 'max:255','min:25'],
        //     'category' => ['required'],
        //     'stock' => 'required|numeric',
        //     'price' => 'required|numeric',
        //     'SKU' => 'required',
        //     'tags' => 'required',
        //     'editor' => 'required',
            
        // ]);

        $data = new Products();
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->brand_id = $request->brand;
        $data->color = $request->color;
        $data->stock = $request->stock;
        $data->price = $request->price;
        $data->stock_alert = $request->stockalert;
        $data->special_price = $request->specialprice;
        $data->SKU = $request->SKU;
        if(!empty($request->gallery_image))
        {
            $data->image = $request->gallery_image;
        }
        $data->warranty = $request->warranty;
        $data->delivery_charges = $request->delivery_charges;
        $data->tags = $request->tags;
        $data->product_condition = $request->product_condition;
        $data->description = $request->description_product;
        $data->attribute =implode(",",$request->attribute); 
        $data->attribute_value = implode(",",$request->value); 
        $data->status = 0;
        $data->seller_id = 1;
        $data->save();
        return redirect()->back()->with('success','The Product added Successfully');

    }
}
