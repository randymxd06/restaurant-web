<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Sex;

class SexFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
//    protected $model = Sex::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'symbol' => $this->faker->word,
            'description' => $this->faker->text,
        ];
    }
}
