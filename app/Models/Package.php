<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    //belongs to hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
