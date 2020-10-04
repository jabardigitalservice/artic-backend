<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PragmaRX\Random\Random;

/**
 * Class Booking
 * @package App\Models
 *
 * @property BookingStatus $status
 */
class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['schedule'];

    protected $fillable = [
        'name', 'address', 'phone_number', 'personal_identity', 'organization_name', 'peoples_count',
    ];

    protected $casts = [
        'status' => BookingStatus::class,
    ];

    static public function generateBookingCode()
    {
        $random = new Random();

        return $random->prefix('JCC-')->numeric()->size(6)->get();

    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
