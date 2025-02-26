<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            StockSeeder::class, // Jalankan RoleSeeder terlebih dahulu
            UserSeeder::class, // Kemudian jalankan UserSeeder
        ]);
    }
}
