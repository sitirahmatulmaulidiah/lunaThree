<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $table = 'wisata';

    protected $fillable = [
        'kategori_id',
        'nama_wisata',
        'deskripsi',
        'harga_tiket',
        'jam_buka',
        'hari_buka',  // menggunakan JSON untuk menyimpan hari buka
        'lokasi',
        'fasilitas',
        'gambar',
        'latitude',
        'longitude',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'hari_buka' => 'array', // <-- PENTING: Otomatis konversi JSON ke Array
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
