<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class SellerAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
            if ($this->auth->guard('seller')->check()) {
                return $this->auth->shouldUse('seller');
            }
      

        $this->unauthenticated($request, ['seller']);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('seller.login');
        }
    }
}
