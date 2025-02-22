<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ambil role user yang login
        $user = Auth::user();

        // Periksa role
        if ($user->role->name !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
