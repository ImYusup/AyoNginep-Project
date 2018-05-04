<?php

namespace App\Http\Middleware;

use Closure;

class UserScope
{
    public function handle($request, Closure $next)
    {
        $auth = auth()->user()->getTable();
        if ($auth == 'users' || $auth == 'admins') {
            return $next($request);
        } else {
            dd('Please login to access this feature.');
        }
        
    }
}