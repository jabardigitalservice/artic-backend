<?php

namespace Database\Factories;

use App\Enums\BookingStatus;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Enum\Laravel\Faker\FakerEnumProvider;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var \App\Models\Booking
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        FakerEnumProvider::register();

        return [
            'booking_code' => $this->model::generateBookingCode(),
            'name' => $this->faker->name,
            'address' => $this->faker->streetAddress,
            'phone_number' => $this->faker->phoneNumber,
            'personal_identity' => $this->faker->nik,
            'peoples_count' => $this->faker->numberBetween(5, 20),
            'status' => $this->faker->randomEnum(BookingStatus::class),
        ];
    }
}
