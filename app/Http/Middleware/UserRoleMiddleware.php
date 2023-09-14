<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(in_array(Auth::user()->role, $roles))
        {
            if(Auth::check())
            {
                return $next($request);
            }
        }
        
        return response()->json(["No tienes permiso para acceder a esta url"]);
    }
}
