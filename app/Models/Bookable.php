<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookable extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the bookings for bookable.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * 
     */
    public function availableFor($from, $to): bool
    {
        return 0 == $this->bookings()->betweenDates($from, $to)->count();
    }
}
