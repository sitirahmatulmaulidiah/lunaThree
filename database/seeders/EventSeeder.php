<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\User;


class EventSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Dummy Admin',
            'email' => 'dummy@example.com',
            'password' => bcrypt('password'),
        ]);
        Event::create([
            'name' => 'Festival Seni',
            'location' => 'Alun-alun Kota',
            'date' => Carbon::parse('2025-07-01 10:00:00'),
            'description' => 'Acara budaya yang meriah',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/sample.jpeg',
        ]);

        Event::create([
            'name' => 'Bazar UMKM',
            'location' => 'Lapangan Kecamatan',
            'date' => Carbon::parse('2025-07-10 09:00:00'),
            'description' => 'Bazar produk lokal dari UMKM daerah',
            'user_id' => $user->id,
            'status' => 'approved',
            'image' => 'images/events/sample2.jpeg',
        ]);
    

        // tambah event lain jika perlu
    }
}
