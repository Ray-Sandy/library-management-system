<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use App\Models\User;
use Firebase\JWT\Key;

class MiddlewareAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, \Closure $next)
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        try {
            $decoded = JWT::decode(str_replace('Bearer ', '', $token), new Key(env('JWT_SECRET'), 'HS256'));
            $request->user = User::find($decoded->sub);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}
