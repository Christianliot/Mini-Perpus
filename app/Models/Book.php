<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    /**
     * Kolom yang boleh diisi lewat create() dan update().
     */
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'published_year',
        'stock',
    ];

    /**
     * Relasi kebalikan: satu buku dimiliki oleh satu kategori.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}