<?php

namespace App\Services;

use App\Models\Schedule;
use Illuminate\Support\Carbon;

class ScheduleService
{
    public function generateSchedules(Carbon $startDate, Carbon $endDate)
    {
        $availableSchedules = [
            ['start_at' => 2, 'end_at' => 3],
            ['start_at' => 3, 'end_at' => 4],
            ['start_at' => 4, 'end_at' => 5],
            ['start_at' => 6, 'end_at' => 7],
            ['start_at' => 7, 'end_at' => 8],
            ['start_at' => 8, 'end_at' => 9],
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
