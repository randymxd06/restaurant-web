<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\PaymentMethod;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'token' => $this->faker->word,
            'rnc' => $this->faker->word,
            'order_id' => Order::factory(),
            'payment_method_id' => PaymentMethod::factory(),
            'shipping' => $this->faker->randomFloat(0, 0, 9999999999.),
            'promo' => $this->faker->randomFloat(0, 0, 9999999999.),
            'taxes' => $this->faker->randomFloat(0, 0, 9999999999.),
            'discount' => $this->faker->randomFloat(0, 0, 9999999999.),
            'total' => $this->faker->randomFloat(0, 0, 9999999999.),
            'status' => $this->faker->boolean,
        ];
    }
}
