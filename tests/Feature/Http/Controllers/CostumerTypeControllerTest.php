<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\CostumerType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CustomerTypeController
 */
class CostumerTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $costumerTypes = CostumerType::factory()->count(3)->create();

        $response = $this->get(route('costumer-type.index'));

        $response->assertOk();
        $response->assertViewIs('costumerType.index');
        $response->assertViewHas('costumerTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('costumer-type.create'));

        $response->assertOk();
        $response->assertViewIs('costumerType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CustomerTypeController::class,
            'store',
            \App\Http\Requests\CostumerTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('costumer-type.store'));

        $response->assertRedirect(route('costumerType.index'));
        $response->assertSessionHas('costumerType.id', $costumerType->id);

        $this->assertDatabaseHas(costumerTypes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $costumerType = CostumerType::factory()->create();

        $response = $this->get(route('costumer-type.show', $costumerType));

        $response->assertOk();
        $response->assertViewIs('costumerType.show');
        $response->assertViewHas('costumerType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $costumerType = CostumerType::factory()->create();

        $response = $this->get(route('costumer-type.edit', $costumerType));

        $response->assertOk();
        $response->assertViewIs('costumerType.edit');
        $response->assertViewHas('costumerType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CustomerTypeController::class,
            'update',
            \App\Http\Requests\CostumerTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $costumerType = CostumerType::factory()->create();

        $response = $this->put(route('costumer-type.update', $costumerType));

        $costumerType->refresh();

        $response->assertRedirect(route('costumerType.index'));
        $response->assertSessionHas('costumerType.id', $costumerType->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $costumerType = CostumerType::factory()->create();

        $response = $this->delete(route('costumer-type.destroy', $costumerType));

        $response->assertRedirect(route('costumerType.index'));

        $this->assertDeleted($costumerType);
    }
}
