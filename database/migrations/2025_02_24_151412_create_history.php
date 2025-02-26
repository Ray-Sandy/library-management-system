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
        Schema::create('historiy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('stock_id')->constrained()->onDelete('cascade'); 
            $table->timestamp('borrowed_at')->useCurrent(); 
            $table->timestamp('returned_at')->nullable(); 
            $table->enum('status', ['borrowed', 'returned'])->default('borrowed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
