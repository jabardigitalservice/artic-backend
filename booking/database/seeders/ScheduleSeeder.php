<?php

namespace Database\Seeders;

use App\Services\ScheduleService;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new ScheduleService();

        $startDate = today()->addDay();
        $endDate = $startDate->copy()->addDays(30);

        $service->generateSchedules($startDate, $endDate);
    }
}
