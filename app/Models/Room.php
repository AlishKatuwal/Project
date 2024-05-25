<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    //belongs to hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    //belongs to booking
    public function booking()
    {
        return $this->hasMany(HotelBooking::class);
    }
}
