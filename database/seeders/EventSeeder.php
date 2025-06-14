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
            'latitude' => -3.297761108707186,   
            'longitude' =>114.5901015801136
        ]);

        Event::create([
            'name' => 'Lomba Mewarnai',
            'location' => 'Ramayana Antasari, Banjarmasin',
            'date' => Carbon::parse('2025-06-22 10:00:00'),
            'description' => 'Lomba mewarnai bersama orang tua dengan kategori TK & SD. Dapatkan Doorprize untuk semua peserta',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/lomba_mewarnai.jpg',
            'latitude' => -3.328661090997903,  
            'longitude' => 114.5901015801136
        ]);

        Event::create([
            'name' => 'Konser Musik Baramian Fest',
            'location' => 'Gedung Sultan Suriansyah Banjarmasin',
            'date' => Carbon::parse('2025-06-28 18:00:00'),
            'description' => 'Festival musik dan budaya lokal dengan artis nasional.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/konser_beramian_fest.jpg',
            'latitude' => -3.2987595752777668,  
            'longitude' => 114.59044023778426
        ]);

        Event::create([
            'name' => 'Honda Kids Got Talent',
            'location' => 'Dealer Honda Trio Perintis, jln Perintis Kemerdekaan No.45A Banjarmasin',
            'date' => Carbon::parse('2025-06-28 09:00:00'),
            'description' => 'Pameran hasil karya seniman lokal.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/honda_kids_GotTalent.jpg',
            'latitude' => -3.3104851881584034,   
            'longitude' => 114.59042919545486
        ]);

        Event::create([
            'name' => 'Lomba Menyanyi Lagu Anak',
            'location' => 'Gedung Balairungsari, Taman Budaya Banjarmasin',
            'date' => Carbon::parse('2025-07-23 08:00:00'),
            'description' => 'Kompetisi bernyanyi lagu anak bahasa Banjar. Terbuka untuk umum, segera daftarkan anak anda.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/Lomba_nyanyi_anak.jpg',
            'latitude' => -3.297875130465366,   
            'longitude' => 114.59094299545488
        ]);

        
        Event::create([
            'name' => 'HanaCon 2025',
            'location' => 'Gedung Wanita, Kayutangi',
            'date' => Carbon::parse('2025-08-03 10:00:00'),
            'description' => 'Cosplay Anime Jepang, dengan menghadirkan banyak cosplayer yang sangat menarik bagi pecinta anime',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/cosplay.jpg',
            'latitude' => -3.2956302794674737,   
            'longitude' => 114.5893749527778
        ]);

        Event::create([
            'name' => 'Perjalanan Cinta Ari Lasso',
            'location' => 'Hotel Fugo, Banjarmasin',
            'date' => Carbon::parse('2025-06-28 19:00:00'),
            'description' => 'Perjalanan Cinta Ari Lasso adalah sebuah konser istimewa yang merayakan perjalanan musikal dan kisah cinta dari salah satu ikon musik Indonesia, Ari Lasso.',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/konser_AriLasso.jpg',
            'latitude' => -3.3230618440946857,   
            'longitude' => 114.60346193778429
        ]);

        Event::create([
            'name' => 'CHRONOVIA Closing Party 50th',
            'location' => 'SMA Negeri 7 Banjarmasin',
            'date' => Carbon::parse('2025-07-25 09:00:00'),
            'description' => 'Konser dalam rangka penutupan anniversary 50th SMA Negeri 7 Banjarmasin, dengan menghadirkan penyenyi terkenal yaitu Hivi! dan Akmalz',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/konser_hivi.jpg',
            'latitude' => -3.339570139637572,   
            'longitude' => 114.62057253778447
        ]);

        Event::create([
            'name' => 'Pameran Seni Mulok',
            'location' => 'Bengkel Lukis Sholihin, Taman Budaya Kalsel',
            'date' => Carbon::parse('2025-07-20 10:00:00'),
            'description' => 'Pameran seni lukisan, yang bertemakan MULOK sarana edukatif generasi muda terhadap nilai-nilai lokal',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/mulok.jpg',
            'latitude' => -3.297720941901133,  
            'longitude' => 114.59055563593682
        ]);

        Event::create([
            'name' => '2k RUN',
            'location' => 'Banjarmasin',
            'date' => Carbon::parse('2025-06-22 08:00:00'),
            'description' => 'Festival olahraga lari 2k, terbuka untuk umum dan pelajar putra dan putri free jersey dan mendali ',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/Run.jpg',
            'latitude' => -3.3148676225056866,   
            'longitude' => 114.5925561809794
        ]);
    }
}
