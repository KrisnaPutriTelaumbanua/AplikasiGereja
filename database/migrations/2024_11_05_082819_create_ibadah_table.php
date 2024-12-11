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
        Schema::create('ibadah', function (Blueprint $table) {
            $table->id('id_ibadah');
            $table->date('tgl_ibadah');
            $table->time('waktu_ibadah');
            $table->foreignId('id_kategori')->constrained('categories', 'id_kategori')->onDelete('cascade'); // Foreign key to kategori
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibadah');
    }
};
