<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KurirMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'kurir') {
            abort(403, 'Hanya kurir yang dapat mengakses');
        }

        return $next($request);
    }
}
