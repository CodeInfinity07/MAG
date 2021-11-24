<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Languages;
use App\Models\album;
use App\Models\CustomUserSettings;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;



class ReleaseController extends Controller
{
  public function releaseform(Request $request){
    $user = Auth::user();
    if($user->custom_settings == 1){
      $custom_user = CustomUserSettings::where('user_id', $user->id)->first();
      $c_year = $custom_user->c_year;
      $c_license = $custom_user->c_license;
      $r_year = $custom_user->r_year;
      $r_license = $custom_user->r_license;
      $album = new album;
      $album->user_id = $user->id;
      $album->save();
      $countries = [];
      $collections = Excel::toArray(new Languages,'languages_v1.xlsx');
      $languages = $collections[0];
      $labels = User::where('role_id', '3')->first();
      $typeAcc = $labels->account_type;
      $Rname = $request->releaseName;
      return view('admin.release',compact('Rname','labels','countries','languages','album','typeAcc','c_year','r_year','c_license','r_license'));
    }
    else {
      $album = new album;
      $album->user_id = $user->id;
      $album->save();
      $countries = [];
      $collections = Excel::toArray(new Languages,'languages_v1.xlsx');
      $languages = $collections[0];
      $labels = User::where('role_id', '3')->first();
      $typeAcc = $labels->account_type;
      $Rname = $request->releaseName;
      return view('admin.release',compact('Rname','labels','countries','languages','album','typeAcc'));
    }

  }
}
