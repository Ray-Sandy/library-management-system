<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->integer('year');
            $table->string('isbn')->unique();
            $table->integer('stock')->default(1);
            $table->string('image')->nullable(); // Menyimpan nama file gambar atau path
            $table->timestamps();
            $table->softDeletes(); // Untuk menyimpan histori penghapusan buku (opsional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
