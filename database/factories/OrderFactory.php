<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Box;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrdersType;
use App\Models\Table;
use App\Models\User;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'box_id' => Box::factory(),
            'customer_id' => Customer::factory(),
            'orders_types_id' => OrdersType::factory(),
            'table_id' => Table::factory(),
            'total' => $this->faker->randomFloat(0, 0, 9999999999.),
            'status' => $this->faker->boolean,
        ];
    }
}
