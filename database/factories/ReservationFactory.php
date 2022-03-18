<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\LivingRoom;
use App\Models\Reservation;
use App\Models\TypeReservation;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customers_id' => Customer::factory(),
            'type_reservations_id' => TypeReservation::factory(),
            'living_room_id' => LivingRoom::factory(),
            'date_time' => $this->faker->dateTime(),
            'number_people' => $this->faker->word,
            'description' => $this->faker->text,
            'status' => $this->faker->boolean,
        ];
    }
}
