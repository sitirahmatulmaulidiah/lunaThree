<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'slug'];

    // Satu kategori bisa memiliki banyak wisata
    public function wisatas()
    {
        return $this->hasMany(Wisata::class);
    }
}
