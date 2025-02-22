# Library Management System

## 📌 Setup Project Securely

### Backend (Laravel)
1. **Clone Repository:**
   ```bash
   git clone <repo-url>
   cd library-management-system
   ```
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
     - Password: `password`
   - **Member Account:**
     - Email: `member@example.com`
     - Password: `password`
   - **PENTING:** Ubah password default setelah instalasi pertama!

6. **Run Application Securely:**
   ```bash
   php artisan serve
   ```
   - Pastikan **HTTPS digunakan di production** untuk melindungi data.
   - Gunakan **rate limiting** pada endpoint API untuk mencegah abuse.

---

### Frontend (Telpmate AdminLTE)
1. **Buka folder proyek frontend:**
   ```bash
   cd public/AdminLTE
   ```
2. **Install Dependencies:**
   ```bash
   npm install
   ```
3. **Jalankan frontend:**
   ```bash
   npm run dev
   ```

---

## 🔒 Security Considerations
- **Database Credentials:** Jangan pernah hardcode kredensial dalam kode.
- **Sanitize Input:** Gunakan Laravel ORM (Eloquent) untuk mencegah SQL Injection.
- **Hashing Password:** Semua password dienkripsi menggunakan `bcrypt`.
- **Rate Limiting:** Laravel memiliki fitur bawaan untuk membatasi jumlah request per user.
- **CORS Protection:** Pastikan hanya domain yang diperbolehkan bisa mengakses API.
- **XSS Protection:** Gunakan `e($variable)` atau Blade escaping.

---

## 📝 API Documentation
Gunakan Swagger/OpenAPI untuk mendokumentasikan semua endpoint.

1. **Install Swagger untuk Laravel** (Jika belum terpasang):
   ```bash
   composer require darkaonline/l5-swagger
   ```
2. **Generate Dokumentasi API:**
   ```bash
   php artisan l5-swagger:generate
   ```
3. **Akses Dokumentasi:** Buka browser dan navigasikan ke:
   ```
   http://127.0.0.1:8000/api/documentation
   ```

Dokumentasi mencakup:
- **Security Headers** seperti penggunaan JWT untuk autentikasi.
- **Metode Autentikasi** menggunakan Bearer Token.
- **Error Responses** terkait keamanan, seperti 401 Unauthorized dan 403 Forbidden.

---

## 🔗 SQL Queries dalam Backend
Semua query SQL menggunakan Laravel Query Builder atau Eloquent ORM untuk keamanan.
- File terkait database ada di `app/Models/` dan `database/migrations/`.
- Semua query sudah diproteksi dari SQL Injection.

---

## ✅ Production Deployment Checklist
- Gunakan **HTTPS** untuk semua komunikasi.
- Simpan **env variables** dengan aman (misalnya menggunakan `.env` atau secret manager).
- **Nonaktifkan Debug Mode** sebelum deployment:
  ```env
  APP_DEBUG=false
  ```
- Gunakan **Firewall dan Rate Limiting** untuk melindungi API.

---

## 📞 Support
Jika mengalami masalah, silakan buat issue di repository ini atau hubungi tim pengembang.

