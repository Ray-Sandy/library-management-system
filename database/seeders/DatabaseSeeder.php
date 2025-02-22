<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class, // Jalankan RoleSeeder terlebih dahulu
            UserSeeder::class, // Kemudian jalankan UserSeeder
        ]);
    }
}
