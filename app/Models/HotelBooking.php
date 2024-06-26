<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }   

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }


}
