<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', // Foreign key ke tabel users
        'nama_event',
        'deskripsi',
        'tanggal',
        'tempat_lokasi',
        'status', // 'menunggu', 'disetujui', 'ditolak'
        'gambar', // Path ke gambar
    ];

    /**
     * Mendefinisikan relasi many-to-one: satu Event dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
