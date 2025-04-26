# Proyek UTS Backend Sistem Manajemen Inventory

## Alur Pengerjaan

1. Inisialisasi proyek Laravel baru menggunakan `composer create-project`.
2. Konfigurasi `.env` untuk koneksi database MySQL/PostgreSQL.
3. Membuat migration untuk tabel `admins`, `categories`, `suppliers`, dan `items` dengan relasi sesuai instruksi.
4. Membuat model Laravel dan mendefinisikan relasi antar tabel menggunakan Eloquent ORM.
5. Membuat controller dan API routes untuk operasi CRUD data `items`, `categories`, `suppliers`, serta laporan stok dan ringkasan.
6. Membuat seeder untuk data awal (admin, kategori, pemasok, dan barang).
7. Membuat file `docker-compose.yml` untuk menjalankan container Laravel backend dan database secara bersamaan.
8. Melakukan testing API menggunakan Postman untuk memastikan semua fitur berjalan dengan baik.
9. Commit semua source code dan dokumentasi ke repository GitHub/GitLab.
10. Mengirimkan link repository sebagai hasil akhir proyek UTS.

---

## Struktur Proyek

- `/app/Models` - Model Laravel
- `/app/Http/Controllers` - Controller API
- `/database/migrations` - Migration database
- `/database/seeders` - Seeder data awal
- `/docker-compose.yml` - Konfigurasi Docker container backend dan DB
- `/README.md` - Dokumentasi dan alur pengerjaan proyek

