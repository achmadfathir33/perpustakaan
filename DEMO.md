# Skenario Demo Aplikasi - Sistem Perpustakaan Digital Kampus

## Persiapan
1. Jalankan migrasi dan seeder:
   php artisan migrate:fresh --seed
2. Jalankan dua instance server di dua terminal terpisah:
   - Terminal 1 (Web): php artisan serve --port=8000
   - Terminal 2 (Internal API): php artisan serve --port=8011

## Urutan Langkah Demo
1. Login ke http://127.0.0.1:8000/login menggunakan akun admin (admin.perpustakaan@gmail.com / 12345).
2. Tampilkan Dashboard (/) yang mengambil statistik dari GET /api/stats.
3. Tambah Kategori (/categories).
4. Tambah Buku (/books) dan cek pagination.
5. Tambah Anggota (/members) dan uji pencarian.
6. Buat Peminjaman (/loans/create).
7. Lihat Daftar Peminjaman Aktif (/loans).
8. Proses Pengembalian (/loans/{id}/kembalikan).
9. Tampilkan Laporan (/loans/report) yang mengonsumsi GET /api/loans.
10. Demo API di Postman (/api/stats, /api/books, /api/members, /api/loans).
