<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $teknologi  = Category::create(['name' => 'Teknologi', 'description' => 'Buku tentang teknologi dan pemrograman.']);
        $novel      = Category::create(['name' => 'Novel', 'description' => 'Buku fiksi dan novel.']);
        $sejarah    = Category::create(['name' => 'Sejarah', 'description' => 'Buku sejarah dan biografi.']);
        $pendidikan = Category::create(['name' => 'Pendidikan', 'description' => 'Buku pelajaran dan referensi akademik.']);

        $teknologi->books()->createMany([
            ['title' => 'Belajar Laravel untuk Pemula', 'author' => 'Budi Santoso', 'published_year' => 2023, 'stock' => 5],
            ['title' => 'Dasar-Dasar Basis Data', 'author' => 'Siti Aminah', 'published_year' => 2021, 'stock' => 8],
        ]);

        $novel->books()->createMany([
            ['title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'published_year' => 2005, 'stock' => 4],
            ['title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'published_year' => 1980, 'stock' => 3],
        ]);

        $sejarah->books()->createMany([
            ['title' => 'Sejarah Indonesia Modern', 'author' => 'M.C. Ricklefs', 'published_year' => 2008, 'stock' => 2],
        ]);

        // Kategori Pendidikan sengaja tanpa buku, untuk demo hapus kategori yang berhasil.
    }
}