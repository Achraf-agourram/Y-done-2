<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurent extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'restaurentName',
        'location',
        'capacity',
        'isActive',
        'removed',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function menu()
    {
        return $this->hasOne(Menu::class);
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
