<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelayan_ibadah', function (Blueprint $table) {
            $table->id('id_pelayan_ibadah');
            $table->unsignedBigInteger('id_pelayan');
            $table->unsignedBigInteger('id_ibadah');
            $table->timestamps();


            $table->foreign('id_pelayan')
                ->references('id_pelayan')
                ->on('pelayan')
                ->onDelete('cascade');


            $table->foreign('id_ibadah')
                ->references('id_ibadah')
                ->on('ibadah')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayan_ibadah');
    }
};
