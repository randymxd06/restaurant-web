<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EmployeeType;
use App\Models\Salary;

class SalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_type_id' => EmployeeType::factory(),
            'salary' => $this->faker->randomFloat(0, 0, 9999999999.),
            'status' => $this->faker->boolean,
        ];
    }
}
