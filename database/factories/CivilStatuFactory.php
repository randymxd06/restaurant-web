<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Civil_Statu;

class CivilStatuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CivilStatu::class;

    public function definition()
    {
        return [
            'description' => $this->faker->name(),
            'status' => $this->faker->boolean,
        ];
    }

}
