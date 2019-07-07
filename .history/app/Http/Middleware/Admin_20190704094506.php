<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        $user=$request->user();
        $now=now();
     $age=$now->diffInYears($user->birthday);
        if($age<20){
           return 'your not Login' ;
        }
        return $next($request);
    }
}
