<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Box;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderType;
use App\Models\Table;

class OrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'box_id' => Box::factory(),
            'customer_id' => Customer::factory(),
            'order_types_id' => OrderType::factory(),
            'table_id' => Table::factory(),
            'total' => $this->faker->randomFloat(0, 0, 9999999999.),
            'status' => $this->faker->boolean,
        ];
    }
}
