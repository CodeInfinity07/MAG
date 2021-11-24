<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
        $role = Auth::user()->get_role_name->role_name;

        switch ($role) {
            case 'Admin':
                return '/google.com';
                break;
            case 'Label':
                return '/dashboard';
                break;
            default:
                break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {

        // echo "1";
        // exit;
        $username = $request->input('username');
        $password = $request->input('password');
        return ['username' => $username, 'password' => $password, 'status' => 'Y'];
    }
    // public function showLoginForm()
    // {
    //     return view('auth.login');
    // }
}
