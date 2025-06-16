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

        // Ambil user untuk dijadikan pemilik event
        $userPutu = User::where('name', 'Putu Devia Marsa')->first();
        $userShofia = User::where('name', 'Shofia Pramudia')->first();

        if (!$userPutu || !$userShofia) {
            $this->command->error('User Putu atau Shofia tidak ditemukan. Pastikan UserSeeder sudah dijalankan.');
            return;
        }

        $eventData = [
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => 'Independent Band Competition',
                'deskripsi'    => 'Acara budaya yang meriah dengan berbagai penampilan seni.',
                'tanggal'      => '2025-07-19',
                'waktu'        => '10:00 WITA - Selesai',
                'tempat_lokasi'=> 'Panggung Bakhtiar Sanderta, Taman Budaya',
                'status'       => 'disetujui',
                'gambar'       => 'events/band_kompetisi.jpg',
                'latitude'     => -3.297761108707186,
                'longitude'    => 114.5901015801136,
            ],
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => 'Lomba Mewarnai',
                'deskripsi'    => 'Lomba mewarnai bersama orang tua dengan kategori TK & SD. Dapatkan Doorprize untuk semua peserta',
                'tanggal'      => '2025-06-22',
                'waktu'        => '10:00 WITA - Selesai',
                'tempat_lokasi'=> 'Ramayana Antasari, Banjarmasin',
                'status'       => 'disetujui',
                'gambar'       => 'events/lomba_mewarnai.jpg',
                'latitude'     => -3.328661090997903,
                'longitude'    => 114.5901015801136,
            ],
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => 'Konser Musik Baramian Fest',
                'deskripsi'    => 'Festival musik dan budaya lokal dengan artis nasional.',
                'tanggal'      => '2025-06-28',
                'waktu'        => '18:00 WITA - Selesai',
                'tempat_lokasi'=> 'Gedung Sultan Suriansyah Banjarmasin',
                'status'       => 'disetujui',
                'gambar'       => 'events/konser_beramian_fest.jpg',
                'latitude'     => -3.2987595752777668,
                'longitude'    => 114.59044023778426,
            ],
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => 'Honda Kids Got Talent',
                'deskripsi'    => 'Pameran hasil karya seniman lokal.',
                'tanggal'      => '2025-06-28',
                'waktu'        => '09:00 WITA - Selesai',
                'tempat_lokasi'=> 'Dealer Honda Trio Perintis, jln Perintis Kemerdekaan No.45A Banjarmasin',
                'status'       => 'disetujui',
                'gambar'       => 'events/honda_kids_GotTalent.jpg',
                'latitude'     => -3.3104851881584034,
                'longitude'    => 114.59042919545486,
            ],
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => 'Lomba Menyanyi Lagu Anak',
                'deskripsi'    => 'Kompetisi bernyanyi lagu anak bahasa Banjar. Terbuka untuk umum, segera daftarkan anak anda.',
                'tanggal'      => '2025-07-23',
                'waktu'        => '08:00 WITA - Selesai',
                'tempat_lokasi'=> 'Gedung Balairungsari, Taman Budaya Banjarmasin',
                'status'       => 'disetujui',
                'gambar'       => 'events/Lomba_nyanyi_anak.jpg',
                'latitude'     => -3.297875130465366,
                'longitude'    => 114.59094299545488,
            ],
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => 'HanaCon 2025',
                'deskripsi'    => 'Cosplay Anime Jepang, dengan menghadirkan banyak cosplayer yang sangat menarik bagi pecinta anime',
                'tanggal'      => '2025-08-03',
                'waktu'        => '10:00 WITA - Selesai',
                'tempat_lokasi'=> 'Gedung Wanita, Kayutangi',
                'status'       => 'disetujui',
                'gambar'       => 'events/cosplay.jpg',
                'latitude'     => -3.2956302794674737,
                'longitude'    => 114.5893749527778,
            ],
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => 'Perjalanan Cinta Ari Lasso',
                'deskripsi'    => 'Perjalanan Cinta Ari Lasso adalah sebuah konser istimewa yang merayakan perjalanan musikal dan kisah cinta dari salah satu ikon musik Indonesia, Ari Lasso.',
                'tanggal'      => '2025-06-28',
                'waktu'        => '19:00 WITA - Selesai',
                'tempat_lokasi'=> 'Hotel Fugo, Banjarmasin',
                'status'       => 'disetujui',
                'gambar'       => 'events/konser_AriLasso.jpg',
                'latitude'     => -3.3230618440946857,
                'longitude'    => 114.60346193778429,
            ],
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => 'CHRONOVIA Closing Party 50th',
                'deskripsi'    => 'Konser dalam rangka penutupan anniversary 50th SMA Negeri 7 Banjarmasin, dengan menghadirkan penyenyi terkenal yaitu Hivi! dan Akmalz',
                'tanggal'      => '2025-07-25',
                'waktu'        => '09:00 WITA - Selesai',
                'tempat_lokasi'=> 'SMA Negeri 7 Banjarmasin',
                'status'       => 'disetujui',
                'gambar'       => 'events/konser_hivi.jpg',
                'latitude'     => -3.339570139637572,
                'longitude'    => 114.62057253778447,
            ],
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => 'Pameran Seni Mulok',
                'deskripsi'    => 'Pameran seni lukisan, yang bertemakan MULOK sarana edukatif generasi muda terhadap nilai-nilai lokal',
                'tanggal'      => '2025-07-20',
                'waktu'        => '10:00 WITA - Selesai',
                'tempat_lokasi'=> 'Bengkel Lukis Sholihin, Taman Budaya Kalsel',
                'status'       => 'disetujui',
                'gambar'       => 'events/mulok.jpg',
                'latitude'     => -3.297720941901133,
                'longitude'    => 114.59055563593682,
            ],
            [
                'user_id'      => $userPutu->id,
                'nama_event'   => '2k RUN',
                'deskripsi'    => 'Festival olahraga lari 2k, terbuka untuk umum dan pelajar putra dan putri free jersey dan mendali',
                'tanggal'      => '2025-06-22',
                'waktu'        => '08:00 WITA - Selesai',
                'tempat_lokasi'=> 'Banjarmasin',
                'status'       => 'disetujui',
                'gambar'       => 'events/Run.jpg',
                'latitude'     => -3.3148676225056866,
                'longitude'    => 114.5925561809794,
            ],
        ];

        foreach ($eventData as $data) {
            Event::create($data);
        }
    }
}