<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Recepcion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RecepcionController
 */
class RecepcionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $recepcions = Recepcion::factory()->count(3)->create();

        $response = $this->get(route('recepcion.index'));

        $response->assertOk();
        $response->assertViewIs('recepcion.index');
        $response->assertViewHas('recepcions');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('recepcion.create'));

        $response->assertOk();
        $response->assertViewIs('recepcion.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecepcionController::class,
            'store',
            \App\Http\Requests\RecepcionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('recepcion.store'));

        $response->assertRedirect(route('recepcion.index'));
        $response->assertSessionHas('recepcion.id', $recepcion->id);

        $this->assertDatabaseHas(recepcions, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $recepcion = Recepcion::factory()->create();

        $response = $this->get(route('recepcion.show', $recepcion));

        $response->assertOk();
        $response->assertViewIs('recepcion.show');
        $response->assertViewHas('recepcion');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $recepcion = Recepcion::factory()->create();

        $response = $this->get(route('recepcion.edit', $recepcion));

        $response->assertOk();
        $response->assertViewIs('recepcion.edit');
        $response->assertViewHas('recepcion');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecepcionController::class,
            'update',
            \App\Http\Requests\RecepcionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $recepcion = Recepcion::factory()->create();

        $response = $this->put(route('recepcion.update', $recepcion));

        $recepcion->refresh();

        $response->assertRedirect(route('recepcion.index'));
        $response->assertSessionHas('recepcion.id', $recepcion->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $recepcion = Recepcion::factory()->create();

        $response = $this->delete(route('recepcion.destroy', $recepcion));

        $response->assertRedirect(route('recepcion.index'));

        $this->assertDeleted($recepcion);
    }
}
