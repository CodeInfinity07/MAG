<?php

namespace App\Http\Controllers\SellerControllers;

use App\Http\Controllers\Controller;
use App\Models\SellerModels\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        return view('SellerViews.category.view');
    }

    public function addCategory(Request $request)
    {
        $data = new Category();
        $data->name = $request->parent;
        $data->parent_id = 4;
        $data->description = $request->description;
        $data->seller_id = 1;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = $request->name.date('m-d-Y_hisa').'.'.$image->getClientOriginalExtension(); 
            $image->move(public_path('assets').'/SellerImages/category/',$name);
            $data->image ='/'.$name;
        }
        $data->save();
       return redirect()->back()->with('success','The Category added Successfully');
    }

    public function childCategory()
    {
        $child = $_GET['id'];
        $data = Category::select('id','name')->where('parent_id',$child)->get();
        return $data;
    }
}
