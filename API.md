# Dokumentasi REST API - Perpustakaan Digital Kampus

Base URL: `http://127.0.0.1:8000/api` (Header: `Accept: application/json`)

| Method | URL | Body (jika ada) | Status Sukses / Gagal | Contoh Response |
|---|---|---|---|---|
| GET | `/api/books` | - (Query opsional: `?judul=`, `?category_id=`) | `200 OK` | `{"data": [...], "links": {...}, "meta": {...}}` |
| GET | `/api/books/{id}` | - | `200 OK` / `404 Not Found` | `{"data": {"id": 1, "judul": "..."}}` |
| POST | `/api/books` | `{"judul": "...", "penulis": "...", "penerbit": "...", "tahun_terbit": 2024, "isbn": "...", "stok": 5, "category_id": 1}` | `201 Created` / `422 Unprocessable Entity` | `{"data": {"id": 3, "judul": "..."}}` |
| PUT | `/api/books/{id}` | `{"judul": "...", "penulis": "...", "penerbit": "...", "tahun_terbit": 2024, "isbn": "...", "stok": 10, "category_id": 1}` | `200 OK` / `404 Not Found` / `422 Unprocessable Entity` | `{"data": {"id": 3, "stok": 10}}` |
| DELETE | `/api/books/{id}` | - | `200 OK` / `404 Not Found` | `{"message": "Buku berhasil dihapus."}` |
| GET | `/api/members` | - | `200 OK` | `{"data": [...], "links": {...}, "meta": {...}}` |
| GET | `/api/members/{id}` | - | `200 OK` / `404 Not Found` | `{"data": {"id": 1, "nama": "..."}}` |
| GET | `/api/loans` | - | `200 OK` | `{"data": [...], "links": {...}, "meta": {...}}` |
| POST | `/api/loans` | `{"member_id": 1, "user_id": 1, "tanggal_pinjam": "2026-11-24", "tanggal_kembali": "2026-12-01", "book_ids": [1, 2]}` | `201 Created` / `422 Unprocessable Entity` | `{"data": {"id": 1, "status": "dipinjam", ...}}` |
| PUT | `/api/loans/{id}/kembalikan` | - | `200 OK` / `404 Not Found` | `{"data": {"id": 1, "status": "dikembalikan", "tanggal_dikembalikan": "2026-11-24"}}` |
| GET | `/api/stats` | - | `200 OK` | `{"total_buku": 2, "total_anggota": 1, "peminjaman_aktif": 1}` |