<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Addresses;
use App\Models\Entity;
use App\Models\Sector;

class AddressesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Addresses::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entity_id' => Entity::factory(),
            'sector_id' => Sector::factory(),
            'reference' => $this->faker->word,
            'status' => $this->faker->boolean,
        ];
    }
}
