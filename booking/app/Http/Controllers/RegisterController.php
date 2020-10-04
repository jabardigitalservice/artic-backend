<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\Booking as BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $schedule = $request->input('schedule_id');

        $booking = new Booking();
        $booking->fill($request->all());
        $booking->booking_code = $booking::generateBookingCode();
        $booking->status = BookingStatus::NEW();
        $booking->schedule()->associate($schedule);
        $booking->save();

        $booking->load('schedule');

        return new BookingResource($booking);
    }
}
