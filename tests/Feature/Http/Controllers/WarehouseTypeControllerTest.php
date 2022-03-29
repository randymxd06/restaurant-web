<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\WarehouseType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\WarehouseTypeController
 */
class WarehouseTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $warehouseTypes = WarehouseType::factory()->count(3)->create();

        $response = $this->get(route('warehouse-type.index'));

        $response->assertOk();
        $response->assertViewIs('warehouseType.index');
        $response->assertViewHas('warehouseTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('warehouse-type.create'));

        $response->assertOk();
        $response->assertViewIs('warehouseType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WarehouseTypeController::class,
            'store',
            \App\Http\Requests\WarehouseTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $hasMany = $this->faker->word;

        $response = $this->post(route('warehouse-type.store'), [
            'name' => $name,
            'description' => $description,
            'hasMany' => $hasMany,
        ]);

        $warehouseTypes = WarehouseType::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('hasMany', $hasMany)
            ->get();
        $this->assertCount(1, $warehouseTypes);
        $warehouseType = $warehouseTypes->first();

        $response->assertRedirect(route('warehouseType.index'));
        $response->assertSessionHas('warehouseType.id', $warehouseType->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $warehouseType = WarehouseType::factory()->create();

        $response = $this->get(route('warehouse-type.show', $warehouseType));

        $response->assertOk();
        $response->assertViewIs('warehouseType.show');
        $response->assertViewHas('warehouseType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $warehouseType = WarehouseType::factory()->create();

        $response = $this->get(route('warehouse-type.edit', $warehouseType));

        $response->assertOk();
        $response->assertViewIs('warehouseType.edit');
        $response->assertViewHas('warehouseType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WarehouseTypeController::class,
            'update',
            \App\Http\Requests\WarehouseTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $warehouseType = WarehouseType::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $hasMany = $this->faker->word;

        $response = $this->put(route('warehouse-type.update', $warehouseType), [
            'name' => $name,
            'description' => $description,
            'hasMany' => $hasMany,
        ]);

        $warehouseType->refresh();

        $response->assertRedirect(route('warehouseType.index'));
        $response->assertSessionHas('warehouseType.id', $warehouseType->id);

        $this->assertEquals($name, $warehouseType->name);
        $this->assertEquals($description, $warehouseType->description);
        $this->assertEquals($hasMany, $warehouseType->hasMany);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $warehouseType = WarehouseType::factory()->create();

        $response = $this->delete(route('warehouse-type.destroy', $warehouseType));

        $response->assertRedirect(route('warehouseType.index'));

        $this->assertSoftDeleted($warehouseType);
    }
}
