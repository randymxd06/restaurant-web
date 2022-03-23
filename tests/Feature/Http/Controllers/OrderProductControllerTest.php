<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\OrderProductController
 */
class OrderProductControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $orderProducts = OrderProduct::factory()->count(3)->create();

        $response = $this->get(route('order-product.index'));

        $response->assertOk();
        $response->assertViewIs('orderProduct.index');
        $response->assertViewHas('orderProducts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('order-product.create'));

        $response->assertOk();
        $response->assertViewIs('orderProduct.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderProductController::class,
            'store',
            \App\Http\Requests\OrderProductStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $order_id = $this->faker->randomNumber();
        $box_id = $this->faker->randomNumber();
        $customer_id = $this->faker->randomNumber();
        $order_types_id = $this->faker->randomNumber();
        $table_id = $this->faker->randomNumber();
        $total = $this->faker->randomFloat(/** double_attributes **/);
        $status = $this->faker->boolean;

        $response = $this->post(route('order-product.store'), [
            'order_id' => $order_id,
            'box_id' => $box_id,
            'customer_id' => $customer_id,
            'order_types_id' => $order_types_id,
            'table_id' => $table_id,
            'total' => $total,
            'status' => $status,
        ]);

        $orderProducts = OrderProduct::query()
            ->where('order_id', $order_id)
            ->where('box_id', $box_id)
            ->where('customer_id', $customer_id)
            ->where('order_types_id', $order_types_id)
            ->where('table_id', $table_id)
            ->where('total', $total)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $orderProducts);
        $orderProduct = $orderProducts->first();

        $response->assertRedirect(route('orderProduct.index'));
        $response->assertSessionHas('orderProduct.id', $orderProduct->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $orderProduct = OrderProduct::factory()->create();

        $response = $this->get(route('order-product.show', $orderProduct));

        $response->assertOk();
        $response->assertViewIs('orderProduct.show');
        $response->assertViewHas('orderProduct');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $orderProduct = OrderProduct::factory()->create();

        $response = $this->get(route('order-product.edit', $orderProduct));

        $response->assertOk();
        $response->assertViewIs('orderProduct.edit');
        $response->assertViewHas('orderProduct');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderProductController::class,
            'update',
            \App\Http\Requests\OrderProductUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $orderProduct = OrderProduct::factory()->create();
        $order_id = $this->faker->randomNumber();
        $box_id = $this->faker->randomNumber();
        $customer_id = $this->faker->randomNumber();
        $order_types_id = $this->faker->randomNumber();
        $table_id = $this->faker->randomNumber();
        $total = $this->faker->randomFloat(/** double_attributes **/);
        $status = $this->faker->boolean;

        $response = $this->put(route('order-product.update', $orderProduct), [
            'order_id' => $order_id,
            'box_id' => $box_id,
            'customer_id' => $customer_id,
            'order_types_id' => $order_types_id,
            'table_id' => $table_id,
            'total' => $total,
            'status' => $status,
        ]);

        $orderProduct->refresh();

        $response->assertRedirect(route('orderProduct.index'));
        $response->assertSessionHas('orderProduct.id', $orderProduct->id);

        $this->assertEquals($order_id, $orderProduct->order_id);
        $this->assertEquals($box_id, $orderProduct->box_id);
        $this->assertEquals($customer_id, $orderProduct->customer_id);
        $this->assertEquals($order_types_id, $orderProduct->order_types_id);
        $this->assertEquals($table_id, $orderProduct->table_id);
        $this->assertEquals($total, $orderProduct->total);
        $this->assertEquals($status, $orderProduct->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $orderProduct = OrderProduct::factory()->create();

        $response = $this->delete(route('order-product.destroy', $orderProduct));

        $response->assertRedirect(route('orderProduct.index'));

        $this->assertSoftDeleted($orderProduct);
    }
}
