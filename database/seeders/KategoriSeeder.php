<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            'Wisata Alam', 'Wisata Budaya & Sejarah',
            'Wisata Religi', 'Wisata Buatan'
        ];

        foreach ($kategoris as $nama) {
            Kategori::create([
                'nama' => $nama,
                'slug' => Str::slug($nama)
            ]);
        }
    }
}
