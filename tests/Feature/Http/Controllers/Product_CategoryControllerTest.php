<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Product_CategoryController
 */
class Product_CategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $productCategories = Product_Category::factory()->count(3)->create();

        $response = $this->get(route('product_-category.index'));

        $response->assertOk();
        $response->assertViewIs('productCategory.index');
        $response->assertViewHas('productCategories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('product_-category.create'));

        $response->assertOk();
        $response->assertViewIs('productCategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Product_CategoryController::class,
            'store',
            \App\Http\Requests\Product_CategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('product_-category.store'));

        $response->assertRedirect(route('productCategory.index'));
        $response->assertSessionHas('productCategory.id', $productCategory->id);

        $this->assertDatabaseHas(productCategories, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $productCategory = Product_Category::factory()->create();

        $response = $this->get(route('product_-category.show', $productCategory));

        $response->assertOk();
        $response->assertViewIs('productCategory.show');
        $response->assertViewHas('productCategory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $productCategory = Product_Category::factory()->create();

        $response = $this->get(route('product_-category.edit', $productCategory));

        $response->assertOk();
        $response->assertViewIs('productCategory.edit');
        $response->assertViewHas('productCategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Product_CategoryController::class,
            'update',
            \App\Http\Requests\Product_CategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $productCategory = Product_Category::factory()->create();

        $response = $this->put(route('product_-category.update', $productCategory));

        $productCategory->refresh();

        $response->assertRedirect(route('productCategory.index'));
        $response->assertSessionHas('productCategory.id', $productCategory->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $productCategory = Product_Category::factory()->create();
        $productCategory = ProductCategory::factory()->create();

        $response = $this->delete(route('product_-category.destroy', $productCategory));

        $response->assertRedirect(route('productCategory.index'));

        $this->assertDeleted($productCategory);
    }
}
