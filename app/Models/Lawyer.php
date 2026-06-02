<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    protected $fillable = [
        'user_id',
        'specialization',
        'bio',
        'experience',
        'location',
        'approved',
        'certificate',
        'profile_picture',
        'bar_registration_number',
        'qualification',
        'chamber_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bookings()
{
    return $this->hasMany(Booking::class);
}
    public function caseHistories()
    {
        return $this->hasMany(CaseHistory::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function averageRating()
    {
        return round($this->reviews()->avg('rating'), 1);
    }
    
}
