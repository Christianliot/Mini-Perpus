<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * Kolom yang boleh diisi lewat create() dan update().
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi One-to-Many: satu kategori memiliki banyak buku.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}