<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Ambil user yang sedang login dari auth()
        $user = auth()->user();

        // Pastikan user sudah login
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Periksa role user
        if ($user->role != $role) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return $next($request);
    }

}
