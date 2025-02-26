<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class MiddlewareAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken(); // Ambil token dari header Authorization

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        try {
            // Decode token
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

            // Cari user berdasarkan `id` yang ada di JWT
            $user = User::find($decoded->sub);

            if (!$user) {
                return response()->json(['message' => 'User not found'], 401);
            }

            // Simpan user ke dalam request agar bisa diakses dengan `auth()`
            auth()->setUser($user);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}
