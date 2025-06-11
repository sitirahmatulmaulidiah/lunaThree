<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     protected $fillable = ['name', 'location', 'date', 'description', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
