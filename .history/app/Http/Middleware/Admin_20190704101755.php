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
    public function handle($request, Closure $next,$age)
    {
        $user=$request->user();
     if(!$user){
         return redirect()->route('login');
     }
     $now=now();
     $years=$now->diffInYears($user->birthday);
        if($years<age){
           return 'your not Login' ;
        }
        return $next($request);
    }
}
