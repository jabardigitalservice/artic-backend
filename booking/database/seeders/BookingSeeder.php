<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booking::factory()->times(100)->create();

        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            $schedule = Schedule::inRandomOrder()->first();

            $booking->schedule()->associate($schedule);
            $booking->save();
        }
    }
}
