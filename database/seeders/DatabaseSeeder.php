<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder yang sudah Anda buat di sini
        // Urutannya penting: User harus dibuat terlebih dahulu
        // karena Event memiliki relasi ke User.
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            WisataSeeder::class,
            EventSeeder::class,
        ]);
    }
}
