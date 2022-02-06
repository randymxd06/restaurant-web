<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InventarioController
 */
class InventarioControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $inventarios = Inventario::factory()->count(3)->create();

        $response = $this->get(route('inventario.index'));

        $response->assertOk();
        $response->assertViewIs('inventario.index');
        $response->assertViewHas('inventarios');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('inventario.create'));

        $response->assertOk();
        $response->assertViewIs('inventario.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InventarioController::class,
            'store',
            \App\Http\Requests\InventarioStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('inventario.store'));

        $response->assertRedirect(route('inventario.index'));
        $response->assertSessionHas('inventario.id', $inventario->id);

        $this->assertDatabaseHas(inventarios, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $inventario = Inventario::factory()->create();

        $response = $this->get(route('inventario.show', $inventario));

        $response->assertOk();
        $response->assertViewIs('inventario.show');
        $response->assertViewHas('inventario');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $inventario = Inventario::factory()->create();

        $response = $this->get(route('inventario.edit', $inventario));

        $response->assertOk();
        $response->assertViewIs('inventario.edit');
        $response->assertViewHas('inventario');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InventarioController::class,
            'update',
            \App\Http\Requests\InventarioUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $inventario = Inventario::factory()->create();

        $response = $this->put(route('inventario.update', $inventario));

        $inventario->refresh();

        $response->assertRedirect(route('inventario.index'));
        $response->assertSessionHas('inventario.id', $inventario->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $inventario = Inventario::factory()->create();

        $response = $this->delete(route('inventario.destroy', $inventario));

        $response->assertRedirect(route('inventario.index'));

        $this->assertDeleted($inventario);
    }
}
