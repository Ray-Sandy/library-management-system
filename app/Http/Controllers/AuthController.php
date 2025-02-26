<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        // Ambil user berdasarkan email
        $user = DB::select("SELECT * FROM users WHERE email = ? LIMIT 1", [$credentials['email']]);

        // Jika user tidak ditemukan atau password salah
        if (empty($user) || !Hash::check($credentials['password'], $user[0]->password)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        // Login user
        Auth::loginUsingId($user[0]->id);
        $request->session()->regenerate();

        // Redirect berdasarkan role (langsung dari ENUM)
        return $user[0]->role === 'admin' 
            ? redirect()->route('admin.stocks.index')->with('success', "berhasil login, selamat datang !")
            : redirect()->route('member.explore')->with('success', "selamat datang !");
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

        // Insert user dengan role default 'member'
        DB::insert(
            "INSERT INTO users (name, email, password, role, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?)",
            [$request->name, $request->email, Hash::make($request->password), 'member', now(), now()]
        );
        

        // Ambil user yang baru saja dibuat
        $user = DB::select("SELECT * FROM users WHERE email = ? LIMIT 1", [$request->email]);

        // Login user setelah register
        Auth::loginUsingId($user[0]->id);
        return redirect()->route('login')->with('success', "Terimakasih sudah mendaftar, selamat datang !");
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
