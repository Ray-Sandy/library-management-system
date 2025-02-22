<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaginationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, \Closure $next)
    {
        $request->validate([
            'page' => 'integer|min:1',
            'per_page' => 'integer|min:1|max:100',
        ]);
        return $next($request);
    }
}
