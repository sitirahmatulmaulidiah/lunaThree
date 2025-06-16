<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Event;
use App\Models\User;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Event::truncate();
        Schema::enableForeignKeyConstraints();

        $userPutu = User::where('name', 'Putu Devia Marsa')->first();
        $userShofia = User::where('name', 'Shofia Pramudia')->first();

        if (!$userPutu || !$userShofia) {
            $this->command->error('User Putu atau Shofia tidak ditemukan. Pastikan UserSeeder sudah dijalankan.');
            return;
        }

        $eventData = [
            [
                'user_id' => $userPutu->id,
                'nama_event' => 'Festival Budaya Pasar Terapung 2025',
                'deskripsi' => 'Acara tahunan untuk merayakan budaya sungai di Kalimantan Selatan. Akan ada lomba perahu hias, pameran kuliner khas Banjar, dan pertunjukan musik panting di atas panggung terapung.',
                'tanggal' => '2025-08-17',
                'tempat_lokasi' => 'Siring Pierre Tendean, Banjarmasin',
                'status' => 'disetujui',
                'gambar' => 'events/festival-budaya.jpg', // Path ke gambar
            ],
            [
                'user_id' => $userShofia->id,
                'nama_event' => 'Lomba Fotografi Alam Loksado',
                'deskripsi' => 'Ayo abadikan keindahan alam Loksado! Lomba terbuka untuk umum dengan kategori landscape, human interest, dan fauna. Pendaftaran dibuka hingga akhir bulan ini.',
                'tanggal' => '2025-09-22',
                'tempat_lokasi' => 'Loksado, Hulu Sungai Selatan',
                'status' => 'menunggu',
                'gambar' => 'events/lomba-fotografi.jpg', // Path ke gambar
            ],
            [
                'user_id' => $userPutu->id,
                'nama_event' => 'Workshop Membatik Sasirangan',
                'deskripsi' => 'Belajar langsung cara membuat kain Sasirangan, kain khas suku Banjar. Peserta terbatas, semua bahan sudah disediakan. Diajukan untuk bulan depan.',
                'tanggal' => '2025-07-15',
                'tempat_lokasi' => 'Kampung Sasirangan, Banjarmasin',
                'status' => 'ditolak',
                'gambar' => 'events/workshop-sasirangan.jpg', // Path ke gambar
            ],
        ];
        
        foreach ($eventData as $data) {
            Event::create($data);
        }
    }
}
