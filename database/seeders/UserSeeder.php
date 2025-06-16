<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema; // <-- Import Schema
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nonaktifkan pemeriksaan foreign key untuk sementara
        Schema::disableForeignKeyConstraints();
        
        // Kosongkan tabel
        User::truncate();
        
        // Aktifkan kembali pemeriksaan foreign key
        Schema::enableForeignKeyConstraints();

        // 1. Buat Akun Admin
        User::create([
            'name' => 'Siti Rahmatul Maulidiah',
            'email' => 'admin@lunathree.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // 2. Buat Akun User Biasa
        User::create([
            'name' => 'Putu Devia Marsa',
            'email' => 'putu.devia@example.com',
            'role' => 'user',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Shofia Pramudia',
            'email' => 'shofia.pramudia@example.com',
            'role' => 'user',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
