<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Wisata;
use App\Models\Kategori; // <-- Import model Kategori

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Wisata::truncate();
        Schema::enableForeignKeyConstraints();

        // 1. Ambil ID dari setiap kategori yang kita butuhkan
        // Pastikan KategoriSeeder sudah dijalankan sebelumnya
        $kategoriAlam = Kategori::where('slug', 'wisata-alam')->first();
        $kategoriBudaya = Kategori::where('slug', 'wisata-budaya-sejarah')->first();
        $kategoriReligi = Kategori::where('slug', 'wisata-religi')->first();
        $kategoriBuatan = Kategori::where('slug', 'wisata-buatan')->first();

        // 2. Siapkan data wisata dengan menyertakan 'kategori_id'
        $wisataData = [
            // WISATA ALAM
            [
                'kategori_id' => $kategoriAlam ? $kategoriAlam->id : null,
                'nama_wisata' => 'Pantai Tanjung Dewa',
                'deskripsi' => 'Pantai Tanjung Dewa merupakan destinasi wisata alam di pesisir Kabupaten Tanah Laut yang menawarkan pemandangan laut yang tenang, pasir putih, serta spot matahari terbenam yang indah. Lokasi ini sering dijadikan tempat rekreasi warga lokal maupun wisatawan.',
                'harga_tiket' => 5000,
                'jam_buka' => '07:00 - 18:00 WITA',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Gazebo, Warung makan, Area parkir, Toilet, Spot foto',
                'lokasi' => 'Desa Tanjung Dewa, Kecamatan Panyipatan, Kabupaten Tanah Laut',
                'gambar' => 'wisata/alam/pantai-tanjung-dewa.jpg',
                'latitude' => -4.002500,
                'longitude' => 114.866944,
            ],
            [
                'kategori_id' => $kategoriAlam ? $kategoriAlam->id : null,
                'nama_wisata' => 'Bukit Matang Kaladan',
                'deskripsi' => 'Menawarkan pemandangan "Raja Ampat" ala Kalimantan Selatan. Dari puncaknya, pengunjung dapat melihat hamparan pulau-pulau kecil di tengah waduk Riam Kanan. Sangat populer untuk berkemah dan menikmati matahari terbenam.',
                'harga_tiket' => 15000,
                'jam_buka' => '24 Jam',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Area parkir, Warung, Spot foto, Area berkemah',
                'lokasi' => 'Desa Tiwingan Lama, Aranio, Kab. Banjar',
                'gambar' => 'wisata/alam/bukit-matang-kaladan.jpg',
                'latitude' => -3.425833,
                'longitude' => 115.158333,
            ],
            [
                'kategori_id' => $kategoriAlam ? $kategoriAlam->id : null,
                'nama_wisata' => 'Loksado',
                'deskripsi' => 'Kecamatan di pegunungan Meratus yang terkenal dengan wisata alamnya, terutama bamboo rafting (rakit bambu) menyusuri sungai Amandit. Pengunjung juga bisa mengunjungi air terjun Haratai dan berinteraksi dengan masyarakat Dayak lokal.',
                'harga_tiket' => 250000,
                'jam_buka' => '08:00 - 16:00 WITA',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Penyewaan rakit, Penginapan, Pemandu lokal, Rumah makan',
                'lokasi' => 'Kecamatan Loksado, Kab. Hulu Sungai Selatan',
                'gambar' => 'wisata/alam/loksado.jpg',
                'latitude' => -2.935000,
                'longitude' => 115.500000,
            ],


            //WISATA BUDAYA
            [
                'kategori_id' => $kategoriBudaya ? $kategoriBudaya->id : null,
                'nama_wisata' => 'Pasar Terapung Lok Baintan',
                'deskripsi' => 'Pasar terapung Lok Baintan adalah sebuah pasar tradisional yang berlokasi di atas sungai Martapura. Para pedagang dan pembeli menggunakan perahu jukung untuk bertransaksi. Pemandangan paling eksotis adalah saat matahari terbit.',
                'harga_tiket' => 0,
                'jam_buka' => '06:00 - 09:00 WITA',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Sewa perahu, Pemandu wisata lokal, Warung makan kecil',
                'lokasi' => 'Sungai Martapura, Desa Lok Baintan, Kab. Banjar',
                'gambar' => 'wisata/budaya/pasar-terapung.jpg',
                'latitude' => -3.401111,
                'longitude' => 114.652500,
            ],
            [
                'kategori_id' => $kategoriBudaya ? $kategoriBudaya->id : null,
                'nama_wisata' => 'Museum Wasaka',
                'deskripsi' => 'Museum yang didedikasikan untuk perjuangan rakyat Kalimantan Selatan dalam mempertahankan kemerdekaan. Menyimpan berbagai koleksi sejarah, foto, dan artefak dari masa perjuangan.',
                'harga_tiket' => 5000,
                'jam_buka' => '08:00 - 16:00 WITA',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Toilet, Area parkir, Warung makan',
                'lokasi' => 'Jl. Jenderal Sudirman, Banjarmasin',
                'gambar' => 'wisata/budaya/museum-wasaka.jpg',
                'latitude' => -3.316667,
                'longitude' => 114.600000,
            ],

            [
                'kategori_id' => $kategoriBudaya ? $kategoriBudaya->id : null,
                'nama_wisata' => 'Kampung Sasirangan',
                'deskripsi' => 'Kampung tradisional yang terkenal dengan kerajinan kain sasirangan, kain khas Kalimantan Selatan. Pengunjung bisa melihat proses pembuatan kain dan membeli langsung dari pengrajin.',
                'harga_tiket' => 0,
                'jam_buka' => '08:00 - 17:00 WITA',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Area parkir, Toilet, Warung makan',
                'lokasi' => 'Jl. Pangeran Antasari, Banjarmasin',
                'gambar' => 'wisata/budaya/kampung-sasirangan.jpg',
                'latitude' => -3.316667,
                'longitude' => 114.600000,
            ],

            //WISATA RELIGI
            [
                'kategori_id' => $kategoriReligi ? $kategoriReligi->id : null,
                'nama_wisata' => 'Masjid Sultan Suriansyah',
                'deskripsi' => 'Masjid bersejarah yang merupakan peninggalan Kesultanan Banjar. Memiliki arsitektur khas Banjar dengan atap limas dan ornamen kayu yang indah. Sering dijadikan lokasi foto pre-wedding.',
                'harga_tiket' => 0,
                'jam_buka' => '24 Jam',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Area parkir, Toilet',
                'lokasi' => 'Jl. Sultan Suriansyah, Banjarmasin',
                'gambar' => 'wisata/religi/masjid-sultan.jpg',
                'latitude' => -3.316667,
                'longitude' => 114.600000,
            ],
            [
                'kategori_id' => $kategoriReligi ? $kategoriReligi->id : null,
                'nama_wisata' => 'Masjid Raya Sabilal Muhtadin',
                'deskripsi' => 'Masjid terbesar di Kalimantan Selatan dengan arsitektur modern. Sering digunakan untuk acara keagamaan besar dan menjadi ikon kota Banjarmasin.',
                'harga_tiket' => 0,
                'jam_buka' => '24 Jam',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Area parkir, Toilet, Warung makan',
                'lokasi' => 'Jl. A. Yani, Banjarmasin',
                'gambar' => 'wisata/religi/masjid-sabilal.jpg',
                'latitude' => -3.316667,
                'longitude' => 114.600000,
            ],
            [
                'kategori_id' => $kategoriReligi ? $kategoriReligi->id : null,
                'nama_wisata' => 'Pura Jagatnatha',
                'deskripsi' => 'Pura Hindu yang menjadi tempat ibadah bagi umat Hindu di Banjarmasin. Memiliki arsitektur yang unik dan suasana yang damai.',
                'harga_tiket' => 0,
                'jam_buka' => '08:00 - 17:00 WITA',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Area parkir, Toilet, Warung makan',
                'lokasi' => 'Jl. Pangeran Antasari, Banjarmasin',
                'gambar' => 'wisata/religi/pura-jagatnatha.jpg',
                'latitude' => -3.316667,
                'longitude' => 114.600000,
            ],

            // WISATA BUATAN
            [
                'kategori_id' => $kategoriBuatan ? $kategoriBuatan->id : null,
                'nama_wisata' => 'Taman Siring 0 KM',
                'deskripsi' => 'Taman kota yang terletak di tepi Sungai Martapura. Menyediakan area jogging, taman bermain anak, dan spot foto dengan latar belakang jembatan Barito.',
                'harga_tiket' => 0,
                'jam_buka' => '24 Jam',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Toilet, Area parkir, Warung makan',
                'lokasi' => 'Jl. Siring, Banjarmasin',
                'gambar' => 'wisata/buatan/taman-siring.jpg',
                'latitude' => -3.316667,
                'longitude' => 114.600000,
            ],
            [
                'kategori_id' => $kategoriBuatan ? $kategoriBuatan->id : null,
                'nama_wisata' => 'Taman Van Der Pijl',
                'deskripsi' => 'Taman kota yang terletak di tengah kota Banjarmasin. Memiliki berbagai jenis tanaman hias, area jogging, dan tempat duduk untuk bersantai.',
                'harga_tiket' => 0,
                'jam_buka' => '24 Jam',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Toilet, Area parkir, Warung makan',
                'lokasi' => 'Jl. A. Yani, Banjarmasin',
                'gambar' => 'wisata/buatan/taman-van-der-pijl.jpg',
                'latitude' => -3.316667,
                'longitude' => 114.600000,
            ],
            [
                'kategori_id' => $kategoriBuatan ? $kategoriBuatan->id : null,
                'nama_wisata' => 'Kebun Raya Banua',
                'deskripsi' => 'Kebun raya buatan yang dikembangkan sebagai pusat konservasi tanaman khas Kalimantan, cocok untuk edukasi dan rekreasi alam terbuka.',
                'harga_tiket' => 5000,
                'jam_buka' => '08:00 - 16:00 WITA',
                'hari_buka' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                'fasilitas' => 'Pusat informasi, Toilet, Area parkir, Jalur jalan kaki, Rumah kaca, Labirin',
                'lokasi' => 'Jl. Ahmad Yani Km. 36, Banjarbaru, Kalimantan Selatan',
                'gambar' => 'wisata/buatan/kebun-raya-banua.jpg',
                'latitude' => -3.469722,
                'longitude' => 114.754167,
            ]
        ];

        // 3. Loop dan buat data
        foreach ($wisataData as $data) {
            Wisata::create($data);
        }
    }
}
