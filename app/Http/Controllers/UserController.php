<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua user
        $users = DB::select("SELECT * FROM users");

        return view('page.admin.account.account', compact('users'));
    }

    public function create()
    {   
        // Role didefinisikan langsung, karena tidak ada tabel roles
        $roles = ['admin', 'member'];

        return view('page.admin.account.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('role', $request->role);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,member', // Validasi role sebagai enum
        ]);

        // Hash password sebelum disimpan
        $hashedPassword = Hash::make($request->password);

        // Simpan user menggunakan query SQL langsung
        DB::insert(
            "INSERT INTO users (name, email, password, role, created_at, updated_at) 
            VALUES (?, ?, ?, ?, NOW(), NOW())",
            [
                $request->name,
                $request->email,
                $hashedPassword,
                $request->role, // Role sudah benar, tidak pakai role_id
            ]
        );

        return redirect()->route('admin.accounts.index')->with('success', 'Account created successfully.');
    }

    public function edit($id)
    {
        // Ambil data user berdasarkan ID
        $user = DB::select("SELECT * FROM users WHERE id = ?", [$id]);

        if (!$user) {
            return redirect()->route('admin.accounts.index')->with('error', 'User not found.');
        }

        // Role didefinisikan langsung karena tidak ada tabel roles
        $roles = ['admin', 'member'];

        return view('page.admin.account.edit', ['user' => $user[0], 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:admin,member', // Validasi role enum
        ]);

        // Ambil user dari database
        $user = DB::select("SELECT * FROM users WHERE id = ?", [$id]);

        if (!$user) {
            return redirect()->route('admin.accounts.index')->with('error', 'User not found.');
        }

        // Jika password baru diisi, hash password baru, jika tidak tetap gunakan password lama
        $password = $request->password ? Hash::make($request->password) : $user[0]->password;

        // Update user menggunakan query SQL langsung
        DB::update(
            "UPDATE users SET name = ?, email = ?, password = ?, role = ?, updated_at = NOW() WHERE id = ?",
            [
                $request->name,
                $request->email,
                $password,
                $request->role, // Role sudah benar
                $id
            ]
        );

        return redirect()->route('admin.accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus user berdasarkan ID
        DB::delete("DELETE FROM users WHERE id = ?", [$id]);

        return redirect()->route('admin.accounts.index')->with('success', 'Account deleted successfully.');
    }
}
