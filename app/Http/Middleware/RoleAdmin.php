<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roleAdmin): Response
    {
        if (!in_array($request->user()->isSuperUser, $roleAdmin)) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
