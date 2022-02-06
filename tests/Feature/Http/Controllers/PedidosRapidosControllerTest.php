<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PedidosRapido;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PedidosRapidosController
 */
class PedidosRapidosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $pedidosRapidos = PedidosRapidos::factory()->count(3)->create();

        $response = $this->get(route('pedidos-rapido.index'));

        $response->assertOk();
        $response->assertViewIs('pedidosRapido.index');
        $response->assertViewHas('pedidosRapidos');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('pedidos-rapido.create'));

        $response->assertOk();
        $response->assertViewIs('pedidosRapido.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PedidosRapidosController::class,
            'store',
            \App\Http\Requests\PedidosRapidosStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('pedidos-rapido.store'));

        $response->assertRedirect(route('pedidosRapido.index'));
        $response->assertSessionHas('pedidosRapido.id', $pedidosRapido->id);

        $this->assertDatabaseHas(pedidosRapidos, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $pedidosRapido = PedidosRapidos::factory()->create();

        $response = $this->get(route('pedidos-rapido.show', $pedidosRapido));

        $response->assertOk();
        $response->assertViewIs('pedidosRapido.show');
        $response->assertViewHas('pedidosRapido');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $pedidosRapido = PedidosRapidos::factory()->create();

        $response = $this->get(route('pedidos-rapido.edit', $pedidosRapido));

        $response->assertOk();
        $response->assertViewIs('pedidosRapido.edit');
        $response->assertViewHas('pedidosRapido');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PedidosRapidosController::class,
            'update',
            \App\Http\Requests\PedidosRapidosUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $pedidosRapido = PedidosRapidos::factory()->create();

        $response = $this->put(route('pedidos-rapido.update', $pedidosRapido));

        $pedidosRapido->refresh();

        $response->assertRedirect(route('pedidosRapido.index'));
        $response->assertSessionHas('pedidosRapido.id', $pedidosRapido->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $pedidosRapido = PedidosRapidos::factory()->create();
        $pedidosRapido = PedidosRapido::factory()->create();

        $response = $this->delete(route('pedidos-rapido.destroy', $pedidosRapido));

        $response->assertRedirect(route('pedidosRapido.index'));

        $this->assertDeleted($pedidosRapido);
    }
}
