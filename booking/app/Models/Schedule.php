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

    protected $casts = [
        'start_at' => 'datetime',
        'end_at'   => 'datetime',
    ];
}
