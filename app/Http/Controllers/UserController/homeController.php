<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\UserModels\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class homeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email|unique:users,email',
            ], [
                'email.unique' => 'This Email Already Exist Try another email'
            ]);
            // $user = User::where(['email' => $request->email])->count();
            // if ($user > 0) {
            //     Session::flash('message', 'Please Change Your Email');
            //     Session::flash('alert-class', 'alert-danger');
            //     return redirect()->back();
            // } else {
            // $guest = new Guest();
            // $guest->email = $request->email;
            $code = rand(999999, 111111);
            Session::put('user_email', $request->email);
            Session::put('user_code', $code);
            // $guest->code = $code;
            // $guest->save();
            Mail::to($request->email)->queue(new WelcomeMail($code));
            $email = $request->email;
            Session::flash('success', 'We Have Sent a Code to your Email! Please Check your Email Inbox and');
            return view('user.code.view', compact('email'));
        }
        if (Session::get('user_code') != "" && Session::get('user_email') != "") {
            Session::flash('success', 'We Have Sent a Code to your Email! Please Check your Email Inbox and');
            $email = Session::get('user_email');
            return view('user.code.view', compact('email'));
        }
        return redirect('/');
    }

    public function code(Request $request)
    {
        // echo Session::get('user_code').Session::get('user_email');exit;

        if ((Session::get('user_code') != "") && (Session::get('user_email') != "")) {
            $email = Session::get('user_email');
            if ($request->isMethod('post')) {
                if (Session::get('user_code') == $request->code) {
                    Session::flash('success', 'Code is valid!');
                    // return view('user.packages.view', compact('email'));
                    return redirect('register_form')->with(['email' => $email]);
                } else {
                    Session::flash('error', 'Invalid Code Please Enter Correct Code');
                    return view('user.code.view', compact('email'))->with('status', 'Invalid code');
                }
            }
        }
        return redirect('/');
    }
    public function register_form()
    {
        if ((Session::get('user_code') != "") && (Session::get('user_email') != "")) {
            $email = Session::get('user_email');
            return view('user.packages.view', compact('email'));
        }
    }
    //label form term and condition
    public function term_and_condition()
    {
        return view('user.term_conditions');
    }
    // public function artist_register(){
    //     $data  = Guest::orderby('id','DESC')->first();
    //     $email = $data->email;
    //      return view('artist.register',compact('email'));
    // }
}