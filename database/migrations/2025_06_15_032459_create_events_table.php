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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_event');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->string('waktu')->nullable(); // Kolom untuk waktu
            $table->string('tempat_lokasi');
            $table->string('status')->default('menunggu');
            $table->string('gambar')->nullable(); // Kolom untuk gambar
            $table->decimal('latitude', 10, 8)->nullable(); // Kolom untuk peta
            $table->decimal('longitude', 11, 8)->nullable(); // Kolom untuk peta
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
