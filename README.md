Cara Mengatur Proyek
Persyaratan Sistem
PHP >= 8.0

Composer

MySQL atau database lain yang didukung Laravel

Node.js (untuk mengelola aset frontend)

Langkah-langkah Setup
Clone Repository:

bash
Copy
git clone https://github.com/username/repository-name.git
cd repository-name
Install Dependencies:

Install dependensi PHP menggunakan Composer:

bash
Copy
composer install
Install dependensi frontend menggunakan npm:

bash
Copy
npm install
npm run dev
Setup Environment:

Salin file .env.example ke .env:

bash
Copy
cp .env.example .env
Generate key aplikasi:

bash
Copy
php artisan key:generate
Konfigurasi Database:

Buka file .env dan sesuaikan konfigurasi database:

env
Copy
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
Jalankan Migrasi dan Seeder:

Jalankan migrasi untuk membuat tabel database:

bash
Copy
php artisan migrate
Jalankan seeder untuk mengisi data awal:

bash
Copy
php artisan db:seed
Seeder akan membuat dua pengguna:

Admin: admin@example.com dengan password password.

Member: member@example.com dengan password password.

Jalankan Aplikasi:

Jalankan server Laravel:

bash
Copy
php artisan serve
Buka browser dan akses http://localhost:8000.
