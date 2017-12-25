<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->guest())
        {
                return redirect()->guest('login')->with('error','يجب ان تقوم بتسجيل الدخول أولا  .');
        }

        if(Auth::check() && Auth::user()->role != 1){
            Auth::logout();
            return redirect()->to('login')->with('error','يجب ان تقوم بتسجيل الدخول كصاحب الموقع أولا .');
        }
        return $next($request);
    }
}
