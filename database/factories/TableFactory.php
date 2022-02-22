<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LivingRoom;
use App\Models\Table;

class TableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Table::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'people_capacity' => $this->faker->randomNumber(),
            'living_room_id' => LivingRoom::factory(),
            'description' => $this->faker->text,
            'status' => $this->faker->boolean,
        ];
    }
}
