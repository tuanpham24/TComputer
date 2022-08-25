<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        // nếu user đã đăng nhập
        // if (Auth::check())
        // {
        //     $user = Auth::user();
        //     // nếu level =1 (admin), status = 1 (actived) thì cho qua.
        //     if ($user->status == 1 )
        //     {
        //         return $next($request);
        //     }
        //     else
        //     {
        //         Auth::logout();
        //         return redirect()->route('getLogin');
        //     }
        // }
        //  else
        //     return redirect()-> route('client.auth.user-login');
    }
}
