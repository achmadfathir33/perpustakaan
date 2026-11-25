# Sistem Perpustakaan Digital Kampus

Aplikasi web manajemen perpustakaan berbasis Laravel 12 dengan autentikasi session, role middleware (admin & petugas), REST API (/api/...), serta Dashboard dan Laporan yang mengonsumsi API internal.

## Cara Menjalankan Project
1. Clone repository dan masuk ke folder project.
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env`, jalankan `php artisan key:generate`, lalu pastikan `APP_FAKER_LOCALE=id_ID` dan `INTERNAL_API_URL=http://127.0.0.1:8011`.
4. Jalankan `php artisan migrate:fresh --seed`.
5. Jalankan dua server di dua terminal terpisah:
   - Terminal 1: `php artisan serve --port=8000`
   - Terminal 2: `php artisan serve --port=8011`

## Akun Default (Hasil Seeder)
- Admin: `admin.perpustakaan@gmail.com` / `12345`
- Petugas 1: `petugas1.perpustakaan@gmail.com` / `12345`
- Petugas 2: `petugas2.perpustakaan@gmail.com` / `12345`
