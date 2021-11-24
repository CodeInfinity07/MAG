<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeMail;
use App\Mail\PartnershipMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class partnership extends Controller
{
    public function index(){
        return view('partnership.index');
    }
    public function save_partnership(Request $req)
    {
      $to_name = 'MaDigital';

        $details = [
            'title' => 'Apply Partnership',
            'Other'=>$req->Other,
            'code'=>'d',
            'name' => "$to_name",
            'Youtube'=>$req->Youtube,
            'role'=>$req->role,
            'Spotify'=>$req->Spotify,
            'fname'=>$req->fname,
            'lname'=>$req->lname,
            'creat_for_u'=>$req->creat_for_u,
            'country'=>$req->country,
            'anything_tell'=>$req->anything_tell,
        ];
       $myEmail ='muddasar.habib15@gmail.com';
        Mail::to($myEmail)->send(new PartnershipMail($details));

        return redirect('success')->with('success','You have successfully Applied');
    }
}
