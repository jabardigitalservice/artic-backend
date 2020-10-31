<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class RegisterGetSchedulesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $startDate = today()->addDay();
        $endDate = $startDate->copy()->addWeeks(2);

        $schedules = Schedule::where('start_at', '>', $startDate)
            ->where('end_at', '<', $endDate)
            ->orderBy('start_at', 'asc')
            ->get();

        return $schedules->map(function ($schedule) {
            return [
                'start_at' => $schedule->start_at,
                'end_at' => $schedule->end_at,
                'peoples_count' => $schedule->peoples_count,
            ];
        });
    }
}
