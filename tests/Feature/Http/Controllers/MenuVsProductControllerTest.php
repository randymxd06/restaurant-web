<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\MenuVsProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MenuVsProductController
 */
class MenuVsProductControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $menuVsProducts = MenuVsProduct::factory()->count(3)->create();

        $response = $this->get(route('menu-vs-product.index'));

        $response->assertOk();
        $response->assertViewIs('menuVsProduct.index');
        $response->assertViewHas('menuVsProducts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('menu-vs-product.create'));

        $response->assertOk();
        $response->assertViewIs('menuVsProduct.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuVsProductController::class,
            'store',
            \App\Http\Requests\MenuVsProductStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $menu_id = $this->faker->randomNumber();
        $product_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->post(route('menu-vs-product.store'), [
            'menu_id' => $menu_id,
            'product_id' => $product_id,
            'status' => $status,
        ]);

        $menuVsProducts = MenuVsProduct::query()
            ->where('menu_id', $menu_id)
            ->where('product_id', $product_id)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $menuVsProducts);
        $menuVsProduct = $menuVsProducts->first();

        $response->assertRedirect(route('menuVsProduct.index'));
        $response->assertSessionHas('menuVsProduct.id', $menuVsProduct->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $menuVsProduct = MenuVsProduct::factory()->create();

        $response = $this->get(route('menu-vs-product.show', $menuVsProduct));

        $response->assertOk();
        $response->assertViewIs('menuVsProduct.show');
        $response->assertViewHas('menuVsProduct');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $menuVsProduct = MenuVsProduct::factory()->create();

        $response = $this->get(route('menu-vs-product.edit', $menuVsProduct));

        $response->assertOk();
        $response->assertViewIs('menuVsProduct.edit');
        $response->assertViewHas('menuVsProduct');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuVsProductController::class,
            'update',
            \App\Http\Requests\MenuVsProductUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $menuVsProduct = MenuVsProduct::factory()->create();
        $menu_id = $this->faker->randomNumber();
        $product_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->put(route('menu-vs-product.update', $menuVsProduct), [
            'menu_id' => $menu_id,
            'product_id' => $product_id,
            'status' => $status,
        ]);

        $menuVsProduct->refresh();

        $response->assertRedirect(route('menuVsProduct.index'));
        $response->assertSessionHas('menuVsProduct.id', $menuVsProduct->id);

        $this->assertEquals($menu_id, $menuVsProduct->menu_id);
        $this->assertEquals($product_id, $menuVsProduct->product_id);
        $this->assertEquals($status, $menuVsProduct->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $menuVsProduct = MenuVsProduct::factory()->create();

        $response = $this->delete(route('menu-vs-product.destroy', $menuVsProduct));

        $response->assertRedirect(route('menuVsProduct.index'));

        $this->assertSoftDeleted($menuVsProduct);
    }
}
