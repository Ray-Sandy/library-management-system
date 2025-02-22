<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('page.account.account', compact('users'));
    }

    public function create()
    {   
        $roles = Role::all(); // Ambil semua role dari database
        return view('page.account.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Session::flash('name', $request->title);
        Session::flash('email', $request->author);
        Session::flash('password', $request->publisher);
        Session::flash('role_id', $request->year);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.accounts.index')->with('success', 'Account created successfully.');
    }

    public function edit(User $user)
    {
    $roles = Role::all();
    return view('page.account.edit', compact('users', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.accounts.index')->with('success', 'Account deleted successfully.');
    }
}
