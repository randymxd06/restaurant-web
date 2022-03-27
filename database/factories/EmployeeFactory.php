<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\Entity;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entity_id' => Entity::factory(),
            'employee_type_id' => EmployeeType::factory(),
            'status' => $this->faker->boolean,
            'hire_date' => $this->faker->dateTime(),
        ];
    }
}
