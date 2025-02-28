# Library Management System

## 📌 Setup Project Securely

### Backend (Laravel)
1. **Clone Repository:**
   ```bash
   git clone https://github.com/Ray-Sandy/library-management-system.git
   cd library-management-system
   ```
   - Karena menggunakan template AdminLTE, pastikan url asset pada setiap views blade sudah mengarah pada lokasi file yang tepat.
     
2. **Install Dependencies:**
   ```bash
   composer install
   ```
3. **Set Up Environment:**
   - Copy `.env.example` to `.env`
   ```bash
   cp .env.example .env
   ```
   - Update `.env` with database credentials securely:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_secure_password
     ```
   - **Security Considerations:** Jangan pernah commit `.env` ke GitHub. Gunakan `.gitignore` untuk memastikan file ini tetap privat.

4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```
5. **Migrate & Seed Database:**
   ```bash
   php artisan migrate --seed
   ```
   - Seeder akan membuat akun admin dan member secara otomatis.
   - **Admin Account:**
     - Email: `admin@example.com`
     - Password: `admin123`
   - **Member Account:**
     - Email: `member@example.com`
     - Password: `member123`
   - **PENTING:** Ubah password default setelah instalasi pertama!
7. **Storage link:**
   ```bash
   php artisan storage:link
   ```
   - Penting untuk upload image
   - Berfungsi Untuk menyambungkan file stock-image pada backend storage/app/public/stock-image ke frontend agar dapat di akses views pada public/storage/stck-image
     
7. **Run Application Securely:**
   ```bash
   php artisan serve
   ```
   - Pastikan **HTTPS digunakan di production** untuk melindungi data.
   - Gunakan **rate limiting** pada endpoint API untuk mencegah abuse.

---

8. **Run Application Routes**
   ```bash
   {ip}/ 
   ```
   - Blank page, ada pilihan login atau register pada navbar.
     
8. **Alternatif Run Application **
   ```bash
   {ip}/login
   ```
   - langsung mengarah ke halaman login dan login sesuai dengan Seeder.

10. **Info penting**
   - Jika ada error atau masalah tolong beritahu. Terimakasih.
