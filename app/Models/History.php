<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     */
    protected $table = 'history';

    /**
     * Kolom yang dapat diisi (fillable).
     */
    protected $fillable = [
        'user_id',
        'book_id',
        'borrowed_at',
        'returned_at',
        'status',
    ];

    /**
     * Kolom yang harus di-cast ke tipe data tertentu.
     */
    protected $casts = [
        'borrowed_at' => 'datetime',
        'returned_at' => 'datetime',
        'status' => 'string',
    ];

    /**
     * Relasi ke tabel User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke tabel Book.
     */
    public function stock()
    {
        return $this->belongsTo(related: Stock::class);
    }
}
