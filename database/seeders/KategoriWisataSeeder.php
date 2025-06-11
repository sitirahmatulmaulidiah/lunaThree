<?php

namespace Database\Seeders;

use App\Models\KategoriWisata;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriWisataSeeder extends Seeder
{
    public function run()
    {
        KategoriWisata::insert([
            ['nama_kategori' => 'Budaya'],
            ['nama_kategori' => 'Alam'],
            ['nama_kategori' => 'Sejarah'],
        ]);
    }
}
