<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = ['nama_wisata', 'deskripsi', 'foto', 'latitude', 'longitude', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(KategoriWisata::class, 'kategori_id');
    }
}

