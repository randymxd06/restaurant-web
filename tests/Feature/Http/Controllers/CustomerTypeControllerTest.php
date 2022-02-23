<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\CustomerType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CustomerTypeController
 */
class CustomerTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $customerTypes = CustomerType::factory()->count(3)->create();

        $response = $this->get(route('customer-type.index'));

        $response->assertOk();
        $response->assertViewIs('customerType.index');
        $response->assertViewHas('customerTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('customer-type.create'));

        $response->assertOk();
        $response->assertViewIs('customerType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CustomerTypeController::class,
            'store',
            \App\Http\Requests\CustomerTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->post(route('customer-type.store'), [
            'name' => $name,
            'description' => $description,
            'status' => $status,
        ]);

        $customerTypes = CustomerType::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $customerTypes);
        $customerType = $customerTypes->first();

        $response->assertRedirect(route('customerType.index'));
        $response->assertSessionHas('customerType.id', $customerType->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $customerType = CustomerType::factory()->create();

        $response = $this->get(route('customer-type.show', $customerType));

        $response->assertOk();
        $response->assertViewIs('customerType.show');
        $response->assertViewHas('customerType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $customerType = CustomerType::factory()->create();

        $response = $this->get(route('customer-type.edit', $customerType));

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
            \App\Http\Controllers\CustomerTypeController::class,
            'update',
            \App\Http\Requests\CustomerTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $customerType = CustomerType::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->put(route('customer-type.update', $customerType), [
            'name' => $name,
            'description' => $description,
            'status' => $status,
        ]);

        $customerType->refresh();

        $response->assertRedirect(route('customerType.index'));
        $response->assertSessionHas('customerType.id', $customerType->id);

        $this->assertEquals($name, $customerType->name);
        $this->assertEquals($description, $customerType->description);
        $this->assertEquals($status, $customerType->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $customerType = CustomerType::factory()->create();

        $response = $this->delete(route('customer-type.destroy', $customerType));

        $response->assertRedirect(route('customerType.index'));

        $this->assertSoftDeleted($customerType);
    }
}
