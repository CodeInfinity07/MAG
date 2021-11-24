<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModels\Guest;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    use RegistersUsers;
    public function loginForm()
    {
        return view('seller.login');
    }

    public function login(Request $request)
    {
        $seller = Seller::where('email', '=', $request->email)->first();
        if ($seller != null) {
            if ($seller->verified == 1) {
                if ($seller->blocked == 0) {
                    $credentials = $request->only('email', 'password');
                    if (Auth::guard('seller')->attempt($credentials, $request->remember)) {
                        $user = Seller::where('email', $request->email)->first();
                        if ($user->verified == 1 && $user->blocked == 0) {
                            Auth::guard('seller')->login($user);
                            return view('label.home');
                        }
                    }
                    return redirect()->route('seller.login')->with('status', 'Failed To Process Login');
                } else {
                    return redirect()->route('seller.login')->with('danger', 'Your account Has been Blocked By the Admin.Contact at ebazarSupport@gmail.com');
                }
            } else {
                return redirect()->route('seller.login')->with('confirmation', 'Your Request is underview. We will send you confirmation Email as soon as your details are verified');
            }
        }

        // $credentials = $request->only('email','password');
        // if(Auth::guard('seller')->attempt($credentials,$request->remember))
        // {
        //     $user = Seller::where('email',$request->email)->first();
        //     if($user->verified == 1 && $user->blocked==0){
        //     Auth::guard('seller')->login($user);
        //     return redirect()->route('seller.home');
        //     }
        // }
        // return redirect()->route('seller.login')->with('status','Failed To Process Login');
    }
    public function logout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller.login')->with('status', 'Logout successfully');
    }
    public function registerForm()
    {
        return view('seller.register');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'seller_name' => ['required', 'string', 'max:255', 'min:5'],
            'seller_email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
            'whatapp_no' => 'required|regex:/^(03)[0-9]{9}$/',
            'CNIC' => 'required|regex:/^[1-9][0-9]{12}$/',
            'CNIC_copy' => 'required',
            'shop_name' => ['required', 'string', 'max:255', 'min:5'],
            'shop_address' => ['required', 'string', 'max:255', 'min:15'],
            'shop_image' => 'required',
            'shop_proof' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = new Seller();
        $user->seller_name = $request->seller_name;
        $user->seller_email = $request->seller_email;
        $user->whatapp_no = $request->whatapp_no;
        $user->CNIC = $request->CNIC;

        $user->shop_name = $request->shop_name;
        $user->shop_address = $request->shop_address;


        $user->email = $request->email;
        $user->password =  Hash::make($request->password);

        if ($request->hasFile('CNIC_copy')) {
            $destination_path = 'public/images/CNIC/' . $request->CNIC;
            $image = $request->file('CNIC_copy');
            $image_name = 'CNIC_' . $request->seller_name . '.' . $image->getClientOriginalExtension();
            $path = $request->file('CNIC_copy')->storeAs($destination_path, $image_name);
            $input['CNIC_copy'] = $image_name;

            $user->CNIC_copy = $path;
        }
        if ($request->hasFile('shop_image')) {
            $destination_path = 'public/images/CNIC/' . $request->CNIC;
            $image = $request->file('shop_image');
            $image_name = 'shop_image_' . $request->seller_name . '.' . $image->getClientOriginalExtension();
            $path = $request->file('shop_image')->storeAs($destination_path, $image_name);
            $input['CNIC_copy'] = $image_name;

            $user->shop_image = $path;
        }

        if ($request->hasFile('shop_proof')) {
            $destination_path = 'public/images/CNIC/' . $request->CNIC;
            $image = $request->file('shop_proof');
            $image_name = 'shop_proof_' . $request->seller_name . '.' . $image->getClientOriginalExtension();
            $path = $request->file('shop_proof')->storeAs($destination_path, $image_name);
            $input['CNIC_copy'] = $image_name;

            $user->shop_proof = $path;
        }
        // $users = $user;
        $user->save();
        // $data =Seller::all()->last();
        return view('seller.waitForConfirmation', compact('user'));
    }



    public function dashboard()
    {
        return view('label.home');
    }

    public function labelForm(Request $req)
    {
        // echo $req->range;exit;
        // Session::set('')
        // $data  = Guest::orderby('id', 'DESC')->first();
        // $email = $data->email;
        $email = Session::get('user_email');
        return view('label.register', compact('email'));
    }
    public function save_label(Request $req)
    {
        // echo $req->email;
        $user = User::where(['username' => $req->username])->count();
        if ($user > 0) {
            Session::flash('message', 'Please Change Your Username');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        } else {
            $obj = new User;
            $obj->email = $req->email;
            $obj->role_id = $req->role;
            $obj->username = $req->username;
            $obj->artist_many = $req->numbers;
            $obj->name = $req->name;
            $obj->password = Hash::make($req->pass);
            $obj->country = $req->country;
            $obj->save();
            // set session after registration 
            session()->put('username', $req->username);
            return redirect('success')->with('success', 'You have successfully Registered');
        }
    }
    public function success()
    {
        return view('success');
    }
    public function save_artist(Request $req)
    {
        $user = User::where(['username' => $req->username])->count();
        if ($user > 0) {
            Session::flash('error', 'Please Change Your Username');
            // Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        } else {
            $obj = new User;
            $obj->email = $req->email;
            $obj->role_id = $req->role;
            $obj->username = $req->username;
            $obj->artist_many = 1;
            $obj->name = $req->name;
            $obj->password = Hash::make($req->pass);
            $obj->country = $req->country;
            $obj->save();
            return redirect('success')->with('success', 'You have successfully Registered');
        }
    }
    public function Beatmaker()
    {
        $data  = Guest::orderby('id', 'DESC')->first();
        $email = $data->email;
        return view('Beatmaker.register', compact('email'));
    }
    public function save_beatmaker(Request $req)
    {
        $user = User::where(['username' => $req->username])->count();
        if ($user > 0) {
            Session::flash('message', 'Please Change Your Username');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        } else {
            $obj = new User;
            $obj->email = $req->email;
            $obj->role_id = $req->role;
            $obj->username = $req->username;
            $obj->artist_many = 1;
            $obj->name = $req->name;
            $obj->password = Hash::make($req->pass);
            $obj->country = $req->country;
            $obj->save();
            return redirect('success')->with('success', 'You have successfully Registered');
        }
    }
    public function artist_register()
    {
        $data  = Guest::orderby('id', 'DESC')->first();
        $email = $data->email;
        return view('artist.register', compact('email'));
    }
}