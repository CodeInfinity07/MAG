<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function user_login(Request $req)
    {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password])) {
            $role = Auth::user()->get_role_name->role_name;
            switch ($role) {
                case 'Admin':
                    return redirect()->route('admin.dashboard');
                    break;
                case 'Label':
                    return redirect()->route('dashboard');
                    break;
                case 'Account':
                    return redirect()->route('account.dashboard');
                    break;
                default:
                    break;
            }
        } else {
            // Session::flash('message', 'Your password or username does not match try again!');
            // Session::flash('alert-class', 'alert-danger');
            return redirect()->back()->with('error', 'Your password or username does not match try again! ');
        }
    }
}
