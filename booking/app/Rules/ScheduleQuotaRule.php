<?php

namespace App\Rules;

use App\Models\Schedule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ScheduleQuotaRule implements Rule
{
    private $scheduleId;

    /**
     * Create a new rule instance.
     *
     * @param $scheduleId
     */
    public function __construct($scheduleId)
    {
        $this->scheduleId = $scheduleId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $quotaMaximum = Schedule::PEOPLES_QUOTA;

        $peoplesCount = DB::table('bookings')->where('schedule_id', $this->scheduleId)->sum('peoples_count');

        return ($peoplesCount + $value <= $quotaMaximum);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Jumlah peserta melebihi kuota pada waktu tersebut.';
    }
}
