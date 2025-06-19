<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
//tambahan
use Illuminate\Support\Facades\Auth as Auth;

class Peran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $peran): Response
    {
        //return $next($request);
        //multiple peran
        if(Auth::check()){
            $perans = explode('-',$peran);
            foreach ($perans as $group) {
                if(Auth::user()->role_access == $group ){
                    return $next($request);
                }
            }
        }

        return redirect('/access-denied');
    }
}