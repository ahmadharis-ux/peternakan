<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
{

    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user()->role->nama === $role) {
            return $next($request);
        }

        abort(403);
    }
}
