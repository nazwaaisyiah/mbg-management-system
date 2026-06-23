<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SekolahMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'sekolah') {
            abort(403, 'Hanya sekolah yang dapat mengakses');
        }

        return $next($request);
    }
}
