<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi (fillable).
     */
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'isbn',
        'status',
    ];

    /**
     * Kolom yang harus disembunyikan (hidden).
     */
    protected $hidden = [
        // Jika ada kolom yang perlu disembunyikan, tambahkan di sini
    ];

    /**
     * Kolom yang harus di-cast ke tipe data tertentu.
     */
    protected $casts = [
        'year' => 'integer', // Cast kolom 'year' ke integer
        'status' => 'string', // Cast kolom 'status' ke string
    ];

    /**
     * Nilai default untuk atribut tertentu.
     */
    protected $attributes = [
        'status' => 'available', // Nilai default untuk kolom 'status'
    ];
}
