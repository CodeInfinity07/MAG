<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ArtistLabel;
use Illuminate\Http\Request;

class Admin extends Controller
{
    //for dashboard view
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    //for logout
    public function Logout()
    {
        Auth::logout();
        return redirect('login');
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
    public function add_artist(Request $req)
    {

        if (!empty($req->add_artist)) {
            foreach ($req->add_artist as $artist) {
                if ($artist != '') {
                    $obj = new ArtistLabel;
                    $obj->user_id = $req->user_id;
                    $obj->name = $artist;
                    $obj->updated_at = null;
                    $obj->save();
                }
            }
        }
        if (!empty($req->update)) {
            foreach ($req->update as $key => $updates) {

                $update_row = ArtistLabel::where(['id' => $req->update_id[$key]])->first();
                // echo $update_row->name . " != " . $updates . "<br>";
                // echo "check nul" . is_null($update_row->updated_at) . "<br>";
                if (is_null($update_row->updated_at) && ($update_row->name != $updates)) {
                    echo "1<br>";
                    ArtistLabel::where(['id' => $req->update_id[$key]])->update([
                        'name' => $updates
                    ]);
                }
            }
        }
        return redirect()->back()->with('success', 'SuccessFully Updated!');
    }
    public function update_Artist_name(Request $req)
    {

        User::where(['id' => Auth::user()->id])->update([
            'name' => $req->save_artist
        ]);
        return redirect()->back()->with('success', 'SuccessFully Updated!');
    }
}