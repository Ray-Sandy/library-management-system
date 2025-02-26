<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';

    /**
     * Kolom yang dapat diisi (fillable).
     */
    protected $guarded = []; // Semua kolom bisa diisi, kecuali yang eksplisit dicegah

    /**
     * Kolom yang harus di-cast ke tipe data tertentu.
     */
    protected $casts = [
        'year' => 'integer', // Cast kolom 'year' ke integer
        'stock' => 'integer', // Cast kolom 'stock' ke integer
    ];

    /**
     * Nilai default untuk atribut tertentu.
     */
    protected $attributes = [
        'stock' => 1, // Default stock minimal 1
    ];

    /**
     * Menentukan apakah buku tersedia untuk dipinjam.
     */
    public function getStatusAttribute()
    {
        return $this->stock > 0 ? 'Available' : 'Borrowed';
    }
    
}
