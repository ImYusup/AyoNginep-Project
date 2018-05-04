<?php

namespace App\Http\Middleware;

use Closure;

class AdminScope
{
    public function handle($request, Closure $next)
    {
        $auth = auth()->user()->getTable();
        if ($auth == 'admins') {
            return $next($request);
        } else {
            dd('You are unauthorized to access this feature.');
        }
    }
}
