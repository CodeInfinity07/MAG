<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // $guards = empty($guards) ? [null] : $guards;
        if (Auth::user()) {
            $role = Auth::user()->get_role_name->role_name;

            switch ($role) {
                case 'Admin':
                    return redirect('admin/dashboard');
                    break;
                case 'Label':
                    return redirect('dashboard');
                    break;
                case 'Account':
                    return redirect('account/dashboard');
                    break;
                default:
                    return redirect('login');

                    break;
            }
        }
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        return $next($request);
    }
}