<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DapurMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'dapur') {
            abort(403, 'Hanya dapur yang dapat mengakses');
        }

        return $next($request);
    }
}
