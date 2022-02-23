<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class MustVerifiedAuthUser
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
        if( Auth::check() ) {
            if(Auth::user()->password == null || Auth::user()->email_verified_at == null) {

               $allowed_names = ['verify.resend','verify.account','verify.email','password.reset','password.email','password.update','logout'];
               if(isset( Route::getCurrentRoute()->action['as'])) {
                    if( ! in_array(Route::getCurrentRoute()->action['as'],$allowed_names) ) {
                        return redirect()->route('verify.account');
                    }
               } else {
                    return redirect()->route('verify.account');
                }
                
            } else {
                if(isset( Route::getCurrentRoute()->action['as'])) {
                    if( in_array(Route::getCurrentRoute()->action['as'],['verify.resend','verify.account','verify.email']) ) {
                        return abort(404);
                    }
                }
            }
        }

        return $next($request);
    }
}
