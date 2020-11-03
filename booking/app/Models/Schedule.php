<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 * @package App\Models
 *
 * @property \Carbon\Carbon $start_at
 * @property \Carbon\Carbon $end_at
 */
class Schedule extends Model
{
    use HasFactory;

    const PEOPLES_QUOTA = 30;

    protected $casts = [
        'start_at' => 'datetime',
        'end_at'   => 'datetime',
    ];

    protected $appends = [
        'peoples_count'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getPeoplesCountAttribute()
    {
        return $this->bookings()->sum('peoples_count');
    }
}
