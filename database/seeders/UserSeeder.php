<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Ambil role Admin dan Member
        $adminRole = Role::where('name', 'Admin')->first();
        $memberRole = Role::where('name', 'Member')->first();

        // Pastikan role ditemukan
        if (!$adminRole || !$memberRole) {
            $this->command->error('Roles not found! Please run RoleSeeder first.');
            return;
        }

        // Buat user Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        // Buat user Member
        User::create([
            'name' => 'Member User',
            'email' => 'member@example.com',
            'password' => Hash::make('password'),
            'role_id' => $memberRole->id,
        ]);

        $this->command->info('Users seeded successfully!');
    }
}
