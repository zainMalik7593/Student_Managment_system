<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has(['email','password','loginStatus'])) {
            $loginStatus = session()->get('loginStatus');
            if ($loginStatus == 'superAdmin') {
                return $next($request);
            }
        }else{  
            return redirect('/');
        }
    }
}