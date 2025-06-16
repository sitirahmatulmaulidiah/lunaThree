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
        'lokasi',
        'fasilitas',
        'gambar',
        'latitude',
        'longitude',
    ];

    /**
     * Mendefinisikan relasi "belongsTo" (milik).
     * * Fungsi ini memberi tahu Laravel bahwa setiap data 'Wisata'
     * dimiliki oleh satu data 'Kategori'.
     * Ini memungkinkan kita untuk memanggil $wisata->kategori
     * di dalam controller atau view.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
