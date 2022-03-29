<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ingredient;
use App\Models\RecipesVsIngredients;
use App\Models\UnitsMeasurement;

class RecipesVsIngredientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecipesVsIngredients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ingredients_id' => Ingredient::factory(),
            'quantity' => $this->faker->randomNumber(),
            'unit_measurement_id' => UnitsMeasurement::factory(),
            'description' => $this->faker->text,
        ];
    }
}
