<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PasswordRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->roles_id==1||Auth::user()->roles_id==2){
            return $next($request);
        }else{
            return redirect('/home')->with(['fail'=>'The requested action is not authorised. Contact your teacher/librarian']);
        }

    }
}
