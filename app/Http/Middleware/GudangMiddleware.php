<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GudangMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'gudang') {
            abort(403, 'Hanya gudang yang dapat mengakses');
        }

        return $next($request);
    }
}
