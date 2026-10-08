# Mini-Perpus

## Deskripsi
Sistem manajemen inventaris perpustakaan berbasis web untuk mengelola kategori buku dan daftar buku. Dibuat memenuhi untuk UTS Framework Programming.

## Teknologi
- Laravel 13
- PHP 8.3+
- MySQL
- Blade
- Bootstrap 5 (CDN)
- Eloquent ORM

## Fitur
- CRUD Category
- CRUD Book
- Relasi One-to-Many (Category hasMany Book, Book belongsTo Category)
- Server-side Validation
- Pesan error validasi (`@error`)
- Flash Message
- Kategori yang masih memiliki buku tidak dapat dihapus

## Instalasi
1. Clone repository
   `git clone <url-repository>` lalu `cd mini-perpus`
2. `composer install`
3. Salin `.env.example` menjadi `.env`
4. Buat database `mini_perpus`, lalu sesuaikan `DB_*` di `.env`
5. `php artisan key:generate`
6. `php artisan migrate`
7. `php artisan db:seed`
8. `php artisan serve`

Buka `http://127.0.0.1:8000`.

## Import database.sql (alternatif)
Sebagai ganti langkah 6 dan 7, import file `database.sql` ke database `mini_perpus` lewat phpMyAdmin atau:
`mysql -u root mini_perpus < database.sql`