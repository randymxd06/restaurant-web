<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EmployeeType;
use App\Models\WorkArea;

class EmployeeTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word,
            'description' => $this->faker->text,
            'work_area_id' => WorkArea::factory(),
            'status' => $this->faker->boolean,
        ];
    }
}
