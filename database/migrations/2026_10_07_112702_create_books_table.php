<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel books dengan foreign key ke categories.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();
            $table->string('title', 255);
            $table->string('author', 100);
            $table->integer('published_year');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel books.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};