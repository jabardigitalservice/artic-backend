<?php

namespace App\Services;

use App\Models\Schedule;
use Illuminate\Support\Carbon;

class ScheduleService
{
    public function generateSchedules(Carbon $startDate, Carbon $endDate)
    {
        $availableSchedules = [
            ['start_at' => 9, 'end_at' => 10],
            ['start_at' => 10, 'end_at' => 11],
            ['start_at' => 11, 'end_at' => 12],
            ['start_at' => 13, 'end_at' => 14],
            ['start_at' => 14, 'end_at' => 15],
            ['start_at' => 15, 'end_at' => 16],
        ];

        while ($startDate->isBefore($endDate)) {
            foreach ($availableSchedules as $availableSchedule) {
                $schedule = new Schedule();
                $schedule->start_at = $startDate->setHour($availableSchedule['start_at']);
                $schedule->end_at = $startDate->copy()->setHour($availableSchedule['end_at']);
                $schedule->save();
            }

            $startDate->addDay();
        }
    }
}
