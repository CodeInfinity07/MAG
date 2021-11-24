<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/success";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email', 'max:255'],
            'name' => ['required'],
            'username' => ['required', 'max:255', 'unique:users,username'],
            'pass' => ['required', 'min:8'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        // $user = User::where(['username' => $data['username']])->count();
        // if ($user > 0) {
        //     Session::flash('error', 'Please Change Your Username');
        //     return redirect()->back();
        // } else {
        // echo $data['numbers'];
        // exit;
        Session::forget('user_email');
        Session::forget('user_code');
        Session::flash('success', 'You have successfully Registered');
        return  User::create([
            'email' => $data['email'],
            'role_id' => $data['role'],
            'artist_many' => $data['numbers'],
            'name' => $data['name'],
            'country' => $data['country'],
            'username' => $data['username'],
            'password' => Hash::make($data['pass']),
        ]);
        // return redirect('success')->with('success', 'You have successfully Registered');
        // }
    }
}