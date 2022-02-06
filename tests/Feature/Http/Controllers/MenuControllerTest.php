<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MenuController
 */
class MenuControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $menus = Menu::factory()->count(3)->create();

        $response = $this->get(route('menu.index'));

        $response->assertOk();
        $response->assertViewIs('menu.index');
        $response->assertViewHas('menus');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('menu.create'));

        $response->assertOk();
        $response->assertViewIs('menu.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuController::class,
            'store',
            \App\Http\Requests\MenuStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('menu.store'));

        $response->assertRedirect(route('menu.index'));
        $response->assertSessionHas('menu.id', $menu->id);

        $this->assertDatabaseHas(menus, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $menu = Menu::factory()->create();

        $response = $this->get(route('menu.show', $menu));

        $response->assertOk();
        $response->assertViewIs('menu.show');
        $response->assertViewHas('menu');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $menu = Menu::factory()->create();

        $response = $this->get(route('menu.edit', $menu));

        $response->assertOk();
        $response->assertViewIs('menu.edit');
        $response->assertViewHas('menu');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuController::class,
            'update',
            \App\Http\Requests\MenuUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $menu = Menu::factory()->create();

        $response = $this->put(route('menu.update', $menu));

        $menu->refresh();

        $response->assertRedirect(route('menu.index'));
        $response->assertSessionHas('menu.id', $menu->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $menu = Menu::factory()->create();

        $response = $this->delete(route('menu.destroy', $menu));

        $response->assertRedirect(route('menu.index'));

        $this->assertDeleted($menu);
    }
}
