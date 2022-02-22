<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\OrderController
 */
class OrderControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $orders = Order::factory()->count(3)->create();

        $response = $this->get(route('order.index'));

        $response->assertOk();
        $response->assertViewIs('order.index');
        $response->assertViewHas('orders');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('order.create'));

        $response->assertOk();
        $response->assertViewIs('order.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderController::class,
            'store',
            \App\Http\Requests\OrderStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $user_id = $this->faker->randomNumber();
        $box_id = $this->faker->randomNumber();
        $customer_id = $this->faker->randomNumber();
        $orders_types_id = $this->faker->randomNumber();
        $table_id = $this->faker->randomNumber();
        $total = $this->faker->randomFloat(/** decimal_attributes **/);
        $status = $this->faker->boolean;

        $response = $this->post(route('order.store'), [
            'user_id' => $user_id,
            'box_id' => $box_id,
            'customer_id' => $customer_id,
            'orders_types_id' => $orders_types_id,
            'table_id' => $table_id,
            'total' => $total,
            'status' => $status,
        ]);

        $orders = Order::query()
            ->where('user_id', $user_id)
            ->where('box_id', $box_id)
            ->where('customer_id', $customer_id)
            ->where('orders_types_id', $orders_types_id)
            ->where('table_id', $table_id)
            ->where('total', $total)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $orders);
        $order = $orders->first();

        $response->assertRedirect(route('order.index'));
        $response->assertSessionHas('order.id', $order->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $order = Order::factory()->create();

        $response = $this->get(route('order.show', $order));

        $response->assertOk();
        $response->assertViewIs('order.show');
        $response->assertViewHas('order');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $order = Order::factory()->create();

        $response = $this->get(route('order.edit', $order));

        $response->assertOk();
        $response->assertViewIs('order.edit');
        $response->assertViewHas('order');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderController::class,
            'update',
            \App\Http\Requests\OrderUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $order = Order::factory()->create();
        $user_id = $this->faker->randomNumber();
        $box_id = $this->faker->randomNumber();
        $customer_id = $this->faker->randomNumber();
        $orders_types_id = $this->faker->randomNumber();
        $table_id = $this->faker->randomNumber();
        $total = $this->faker->randomFloat(/** decimal_attributes **/);
        $status = $this->faker->boolean;

        $response = $this->put(route('order.update', $order), [
            'user_id' => $user_id,
            'box_id' => $box_id,
            'customer_id' => $customer_id,
            'orders_types_id' => $orders_types_id,
            'table_id' => $table_id,
            'total' => $total,
            'status' => $status,
        ]);

        $order->refresh();

        $response->assertRedirect(route('order.index'));
        $response->assertSessionHas('order.id', $order->id);

        $this->assertEquals($user_id, $order->user_id);
        $this->assertEquals($box_id, $order->box_id);
        $this->assertEquals($customer_id, $order->customer_id);
        $this->assertEquals($orders_types_id, $order->orders_types_id);
        $this->assertEquals($table_id, $order->table_id);
        $this->assertEquals($total, $order->total);
        $this->assertEquals($status, $order->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $order = Order::factory()->create();

        $response = $this->delete(route('order.destroy', $order));

        $response->assertRedirect(route('order.index'));

        $this->assertSoftDeleted($order);
    }
}
