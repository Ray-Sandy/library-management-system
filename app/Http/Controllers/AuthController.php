<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Ambil role user yang login
            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role->name === 'Admin') { // Periksa role langsung
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('member.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Tampilkan halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Default role: Member
        $memberRole = Role::where('name', 'Member')->first();

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $memberRole->id,
        ]);

        // Login user setelah register
        Auth::login($user);

        return redirect()->route('member.dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}