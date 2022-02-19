<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\CustomerType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Customer_TypeController
 */
class Customer_TypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $customerTypes = Customer_Type::factory()->count(3)->create();

        $response = $this->get(route('customer_-type.index'));

        $response->assertOk();
        $response->assertViewIs('customerType.index');
        $response->assertViewHas('customerTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('customer_-type.create'));

        $response->assertOk();
        $response->assertViewIs('customerType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Customer_TypeController::class,
            'store',
            \App\Http\Requests\Customer_TypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('customer_-type.store'));

        $response->assertRedirect(route('customerType.index'));
        $response->assertSessionHas('customerType.id', $customerType->id);

        $this->assertDatabaseHas(customerTypes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $customerType = Customer_Type::factory()->create();

        $response = $this->get(route('customer_-type.show', $customerType));

        $response->assertOk();
        $response->assertViewIs('customerType.show');
        $response->assertViewHas('customerType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $customerType = Customer_Type::factory()->create();

        $response = $this->get(route('customer_-type.edit', $customerType));

        $response->assertOk();
        $response->assertViewIs('customerType.edit');
        $response->assertViewHas('customerType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Customer_TypeController::class,
            'update',
            \App\Http\Requests\Customer_TypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $customerType = Customer_Type::factory()->create();

        $response = $this->put(route('customer_-type.update', $customerType));

        $customerType->refresh();

        $response->assertRedirect(route('customerType.index'));
        $response->assertSessionHas('customerType.id', $customerType->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $customerType = Customer_Type::factory()->create();
        $customerType = CustomerType::factory()->create();

        $response = $this->delete(route('customer_-type.destroy', $customerType));

        $response->assertRedirect(route('customerType.index'));

        $this->assertDeleted($customerType);
    }
}
