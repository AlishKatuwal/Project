<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    //belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function services()
    { 
        return $this->hasMany(Facility::class);
    }
}
