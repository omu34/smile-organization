<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PerformanceHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        // Add performance headers
        $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        
        // Add compression header
        if (strpos($request->header('Accept-Encoding'), 'gzip') !== false) {
            $response->headers->set('Content-Encoding', 'gzip');
        }
        
        return $response;
    }
}
