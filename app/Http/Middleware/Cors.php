<?php

namespace App\Http\Middleware;

use Closure;

class Cors {

    public function handle($request, Closure $next) {
        return $next($request)
                ->header('Access-Control-Allow-Methods', 'OPTIONS, GET, POST, PATCH, PUT, DELETE')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization')
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Max-Age', 60 * 60 * 24);
    }
}