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
        'openingTime',
        'closingTime',
        'isActive',
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
}
