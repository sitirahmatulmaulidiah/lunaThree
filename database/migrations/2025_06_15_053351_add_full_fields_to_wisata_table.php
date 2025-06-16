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
        Schema::table('wisata', function (Blueprint $table) {
            // HAPUS SEMUA BARIS YANG MENAMBAHKAN KOLOM LAMA (lokasi, fasilitas, gambar, jam_buka)
            // TUGAS FILE INI HANYA MENAMBAHKAN KOORDINAT PETA.

            // Kolom untuk koordinat peta. 'decimal' memberikan presisi yang baik.
            $table->decimal('latitude', 10, 8)->nullable()->after('gambar');
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wisata', function (Blueprint $table) {
            // Hanya hapus kolom yang ditambahkan oleh file ini.
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
};
