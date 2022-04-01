<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CivilStatus;
use App\Models\Entity;
use App\Models\Nationality;
use App\Models\Sex;

class EntityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'identification' => $this->faker->word,
            'sex_id' => Sex::factory(),
            'civil_status_id' => CivilStatus::factory(),
            'nationality_id' => Nationality::factory(),
            'status' => $this->faker->boolean,
            'birth_date' => $this->faker->date
        ];
    }
}
