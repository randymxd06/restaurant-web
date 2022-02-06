<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Cocina;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CocinaController
 */
class CocinaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $cocinas = Cocina::factory()->count(3)->create();

        $response = $this->get(route('cocina.index'));

        $response->assertOk();
        $response->assertViewIs('cocina.index');
        $response->assertViewHas('cocinas');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('cocina.create'));

        $response->assertOk();
        $response->assertViewIs('cocina.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CocinaController::class,
            'store',
            \App\Http\Requests\CocinaStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('cocina.store'));

        $response->assertRedirect(route('cocina.index'));
        $response->assertSessionHas('cocina.id', $cocina->id);

        $this->assertDatabaseHas(cocinas, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $cocina = Cocina::factory()->create();

        $response = $this->get(route('cocina.show', $cocina));

        $response->assertOk();
        $response->assertViewIs('cocina.show');
        $response->assertViewHas('cocina');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $cocina = Cocina::factory()->create();

        $response = $this->get(route('cocina.edit', $cocina));

        $response->assertOk();
        $response->assertViewIs('cocina.edit');
        $response->assertViewHas('cocina');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CocinaController::class,
            'update',
            \App\Http\Requests\CocinaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $cocina = Cocina::factory()->create();

        $response = $this->put(route('cocina.update', $cocina));

        $cocina->refresh();

        $response->assertRedirect(route('cocina.index'));
        $response->assertSessionHas('cocina.id', $cocina->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $cocina = Cocina::factory()->create();

        $response = $this->delete(route('cocina.destroy', $cocina));

        $response->assertRedirect(route('cocina.index'));

        $this->assertDeleted($cocina);
    }
}
