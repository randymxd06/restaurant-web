<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Compra;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ComprasController
 */
class ComprasControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $compras = Compras::factory()->count(3)->create();

        $response = $this->get(route('compra.index'));

        $response->assertOk();
        $response->assertViewIs('compra.index');
        $response->assertViewHas('compras');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('compra.create'));

        $response->assertOk();
        $response->assertViewIs('compra.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ComprasController::class,
            'store',
            \App\Http\Requests\ComprasStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('compra.store'));

        $response->assertRedirect(route('compra.index'));
        $response->assertSessionHas('compra.id', $compra->id);

        $this->assertDatabaseHas(compras, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $compra = Compras::factory()->create();

        $response = $this->get(route('compra.show', $compra));

        $response->assertOk();
        $response->assertViewIs('compra.show');
        $response->assertViewHas('compra');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $compra = Compras::factory()->create();

        $response = $this->get(route('compra.edit', $compra));

        $response->assertOk();
        $response->assertViewIs('compra.edit');
        $response->assertViewHas('compra');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ComprasController::class,
            'update',
            \App\Http\Requests\ComprasUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $compra = Compras::factory()->create();

        $response = $this->put(route('compra.update', $compra));

        $compra->refresh();

        $response->assertRedirect(route('compra.index'));
        $response->assertSessionHas('compra.id', $compra->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $compra = Compras::factory()->create();
        $compra = Compra::factory()->create();

        $response = $this->delete(route('compra.destroy', $compra));

        $response->assertRedirect(route('compra.index'));

        $this->assertDeleted($compra);
    }
}
