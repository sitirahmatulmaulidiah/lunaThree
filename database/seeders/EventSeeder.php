<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Hapus data sebelumnya biar tidak dobel
        Event::truncate();
        User::truncate();

        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // Buat dummy user
        $user = User::create([
            'name' => 'Dummy Admin',
            'email' => 'dummy@example.com',
            'password' => bcrypt('password'),
        ]);

        // Tambahkan 10 event
        Event::create([
            'name' => 'Independent Band Competition',
            'location' => 'Panggung Bakhtiar Sanderta, Taman Budaya',
            'date' => Carbon::parse('2025-07-19 10:00:00'),
            'description' => 'Acara budaya yang meriah dengan berbagai penampilan seni.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/band_kompetisi.jpg',
        ]);

        Event::create([
            'name' => 'Lomba Mewarnai',
            'location' => 'Ramayana Antasar, Banjarmasin',
            'date' => Carbon::parse('2025-06-22 10:00:00'),
            'description' => 'Lomba mewarnai bersama orang tua dengan kategori TK & SD. Dapatkan Doorprize untuk semua peserta',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/lomba_mewarnai.jpg',
        ]);

        Event::create([
            'name' => 'Konser Musik Baramian Fest',
            'location' => 'Gedung Sultan Suriansyah Banjarmasin',
            'date' => Carbon::parse('2025-06-28 18:00:00'),
            'description' => 'Festival musik dan budaya lokal dengan artis nasional.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/konser_beramian_fest.jpeg',
        ]);

        Event::create([
            'name' => 'Honda Kids Got Talent',
            'location' => 'Dealer Honda Trio Perintis, jln Perintis Kemerdekaan No.45A Banjarmasin',
            'date' => Carbon::parse('2025-06-28 09:00:00'),
            'description' => 'Pameran hasil karya seniman lokal.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/honda_kids_GotTalent.jpg',
        ]);

        Event::create([
            'name' => 'Lomba Menyanyi Lagu Anak',
            'location' => 'Gedung Balairungsari, Taman Budaya Banjarmasin',
            'date' => Carbon::parse('2025-07-23 08:00:00'),
            'description' => 'Kompetisi bernyanyi lagu anak bahasa Banjar. Terbuka untuk umum, segera daftarkan anak anda.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/Lomba_nyanyi_anak.jpg',
        ]);

        
        Event::create([
            'name' => 'Festival Kuliner Nusantara',
            'location' => 'Lapangan Merdeka',
            'date' => Carbon::parse('2025-07-25 10:00:00'),
            'description' => 'Festival makanan khas berbagai daerah di Indonesia.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/sample6.jpeg',
        ]);

        Event::create([
            'name' => 'Lari Sehat 10K',
            'location' => 'Jalan Protokol Kota',
            'date' => Carbon::parse('2025-07-30 06:00:00'),
            'description' => 'Acara olahraga bersama warga.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/sample7.jpeg',
        ]);

        Event::create([
            'name' => 'Workshop Batik',
            'location' => 'Balai Seni',
            'date' => Carbon::parse('2025-08-05 09:00:00'),
            'description' => 'Pelatihan membatik untuk umum.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/sample8.jpeg',
        ]);

        Event::create([
            'name' => 'Pagelaran Wayang Kulit',
            'location' => 'Pendopo Kota',
            'date' => Carbon::parse('2025-08-10 19:00:00'),
            'description' => 'Pertunjukan wayang kulit tradisional.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/sample9.jpeg',
        ]);

        Event::create([
            'name' => 'Pentas Teater',
            'location' => 'Gedung Kesenian',
            'date' => Carbon::parse('2025-08-15 18:00:00'),
            'description' => 'Pentas drama oleh komunitas seni lokal.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/sample10.jpeg',
        ]);
    }
}
