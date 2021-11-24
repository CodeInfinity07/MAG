<?php

namespace App\Http\Controllers\SellerControllers;

use App\Http\Controllers\Controller;
use App\Models\SellerModels\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class brandController extends Controller
{
    public function index()
    {
        $data = Brands::all();
        return view('SellerViews.brand.view',compact('data'))->with('message','Wellcome to the Gallery');
    }

    public function addBrand(Request $request)
    {
       $data = new Brands();
       $data->name = $request->image_name;
       $data->description = $request->image_description;
       
    //    Auth fileds
        $data->seller_id = 1;
        $data->seller_id = 1;
       if($request->hasFile('image')){
            $image = $request->file('image');
            $name = $request->name.date('m-d-Y_hisa').'.'.$image->getClientOriginalExtension(); 
            $image->move(public_path('assets').'/SellerImages/brand/',$name);
            $data->image ='/'.$name;
        }
        
        $data->save();
       return redirect()->back()->with('success','The Brand added Successfully');
    }
    public function removeImage($id)
    {
        $data = Brands::find($id);
        $data->delete();
        return redirect()->back()->with('error','Image deleted Successfully');
    }
}
