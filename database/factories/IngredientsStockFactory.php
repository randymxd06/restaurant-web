<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ingredient;
use App\Models\IngredientsStock;
use App\Models\UnitsMeasurement;

class IngredientsStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IngredientsStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ingredient_id' => Ingredient::factory(),
            'quantity' => $this->faker->word,
            'unit_measurement_id' => UnitsMeasurement::factory(),
            'arrival_date' => $this->faker->date(),
            'expiration_date' => $this->faker->date(),
        ];
    }
}
