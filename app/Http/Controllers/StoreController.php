<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\admin\Account;
use App\Models\admin\Artist;
use App\Models\admin\Label;
use wapmorgan\MediaFile\MediaFile;
use App\Models\album;
use App\Models\artwork;
use App\Models\audio;
use App\Models\genre;
use App\Models\Languages;
use App\Models\primaryGenre;
use App\Models\release;
use App\Models\User;
use App\Models\Store;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Monarobase\CountryList\CountryListFacade;

class StoreController extends Controller
{
    public function store(Request $request, $id){
      $record = album::where('id',$id)->first();
      $store = new Store;
      $store->stores = $request->stores;
      $territories = array();
      foreach($request->territories as $index => $fid){
        $territories[] = $request->territories[$index];
      }
      $store->territiores = implode(",", $territories);
      $store->album_id = $record->id;
      $store->terr_choice = $request->choiceTerr;
      $store->price_choice = $request->checkVal;
      $store->save();
      $record->store = $store->id;
      $record->save();
    }
}
