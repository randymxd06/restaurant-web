<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\MenuVsProduct;
use App\Models\Product;

class MenuVsProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MenuVsProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'menu_id' => Menu::factory(),
            'product_id' => Product::factory(),
            'status' => $this->faker->boolean,
        ];
    }
}
