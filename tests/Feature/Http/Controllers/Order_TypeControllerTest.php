<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\OrderType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Order_TypeController
 */
class Order_TypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $orderTypes = Order_Type::factory()->count(3)->create();

        $response = $this->get(route('order_-type.index'));

        $response->assertOk();
        $response->assertViewIs('orderType.index');
        $response->assertViewHas('orderTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('order_-type.create'));

        $response->assertOk();
        $response->assertViewIs('orderType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Order_TypeController::class,
            'store',
            \App\Http\Requests\Order_TypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('order_-type.store'));

        $response->assertRedirect(route('orderType.index'));
        $response->assertSessionHas('orderType.id', $orderType->id);

        $this->assertDatabaseHas(orderTypes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $orderType = Order_Type::factory()->create();

        $response = $this->get(route('order_-type.show', $orderType));

        $response->assertOk();
        $response->assertViewIs('orderType.show');
        $response->assertViewHas('orderType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $orderType = Order_Type::factory()->create();

        $response = $this->get(route('order_-type.edit', $orderType));

        $response->assertOk();
        $response->assertViewIs('orderType.edit');
        $response->assertViewHas('orderType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Order_TypeController::class,
            'update',
            \App\Http\Requests\Order_TypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $orderType = Order_Type::factory()->create();

        $response = $this->put(route('order_-type.update', $orderType));

        $orderType->refresh();

        $response->assertRedirect(route('orderType.index'));
        $response->assertSessionHas('orderType.id', $orderType->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $orderType = Order_Type::factory()->create();
        $orderType = OrderType::factory()->create();

        $response = $this->delete(route('order_-type.destroy', $orderType));

        $response->assertRedirect(route('orderType.index'));

        $this->assertDeleted($orderType);
    }
}
