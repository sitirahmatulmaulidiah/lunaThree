<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wisata', function (Blueprint $table) {
            // Menambahkan foreign key yang terhubung ke tabel 'kategoris'
            // onDelete('set null') berarti jika sebuah kategori dihapus,
            // kolom kategori_id di wisata akan menjadi NULL, bukan ikut terhapus.
            $table->foreignId('kategori_id')->nullable()->after('id')->constrained('kategoris')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('wisata', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
};
