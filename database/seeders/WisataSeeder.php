<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WisataSeeder extends Seeder
{
    public function run()
    {
        Wisata::insert([
            [
                'nama_wisata' => 'Candi Borobudur',
                'deskripsi' => 'Candi Buddha terbesar di dunia, dengan relief dan arsitektur megah.',
                'foto' => 'wisata/borobudur.jpg',
                'latitude' => -7.607874,
                'longitude' => 110.203751,
                'kategori_id' => 3, // Sejarah
            ],
            [
                'nama_wisata' => 'Pantai Kuta',
                'deskripsi' => 'Pantai populer di Bali dengan pasir putih dan ombak cocok untuk surfing.',
                'foto' => 'wisata/kuta.jpg',
                'latitude' => -8.717764,
                'longitude' => 115.168404,
                'kategori_id' => 2, // Alam
            ],
            [
                'nama_wisata' => 'Festival Ogoh-Ogoh',
                'deskripsi' => 'Tradisi budaya Bali menjelang Nyepi, menampilkan patung raksasa.',
                'foto' => 'wisata/ogohogoh.jpg',
                'latitude' => -8.6696,
                'longitude' => 115.2126,
                'kategori_id' => 1, // Budaya
            ],
        ]);
    }
}
