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
     $yearnow=$now->diffInYears($user->birthday);
        if($yearnow<20){
           return 'your not Logiin' ;
        }
        return $next($request);
    }
}
