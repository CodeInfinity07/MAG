<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\admin\Account;
use App\Models\admin\Artist;
use App\Models\admin\Label;
use wapmorgan\Mp3Info\Mp3Info;
use App\Models\album;
use App\Models\artwork;
use App\Models\audio;
use App\Models\genre;
use App\Models\Languages;
use App\Models\primaryGenre;
use App\Models\release;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Monarobase\CountryList\CountryListFacade;

class AudioController extends Controller
{
    public function save($id) {
      $fetch = audio::where('album_id',$id)->where('is_set_audio', 0)->get();
      $collections = Excel::toArray(new Languages,'languages_v1.xlsx');
      $languages = $collections[0];
      $num = audio::where('album_id',$id)->get();
      $total_tracks = count($num);
      $tr = array();
      for($i=(int)$total_tracks; $i > 0; $i--){
        $tr[] = $i;
      }
      return view('admin.audiodetails',compact('fetch','languages','tr'));
    }
}
