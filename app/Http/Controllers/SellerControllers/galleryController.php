<?php

namespace App\Http\Controllers\SellerControllers;

use App\Http\Controllers\Controller;
use App\Models\SellerModels\Gallery;
use Illuminate\Http\Request;

class galleryController extends Controller
{
    public function index()
    {
        $data = Gallery::all();
        return view('SellerViews.gallery.view',compact('data'))->with('message','Wellcome to the Gallery');
    }

    public function addImage(Request $request)
    {
       $data = new Gallery();
       $data->name = $request->image_name;
       $data->description = $request->image_description;
       
    //    Auth fileds
        $data->seller_id = 1;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = $request->name.date('m-d-Y_hisa').'.'.$image->getClientOriginalExtension(); 
            $image->move(public_path('assets').'/SellerImages/gallery/',$name);
            $data->image ='/'.$name;
        }
        $data->save();
       return redirect()->back()->with('success','The Image added Successfully');
    }

    public function removeImage($id)
    {
        $data = Gallery::find($id);
        $data->delete();
        return redirect()->back()->with('error','Image deleted Successfully');
    }
}
