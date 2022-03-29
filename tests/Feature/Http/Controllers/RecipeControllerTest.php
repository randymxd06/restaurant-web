<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RecipeController
 */
class RecipeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $recipes = Recipe::factory()->count(3)->create();

        $response = $this->get(route('recipe.index'));

        $response->assertOk();
        $response->assertViewIs('recipe.index');
        $response->assertViewHas('recipes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('recipe.create'));

        $response->assertOk();
        $response->assertViewIs('recipe.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipeController::class,
            'store',
            \App\Http\Requests\RecipeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $product_id = $this->faker->randomNumber();
        $name = $this->faker->name;
        $instructions = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->post(route('recipe.store'), [
            'product_id' => $product_id,
            'name' => $name,
            'instructions' => $instructions,
            'status' => $status,
        ]);

        $recipes = Recipe::query()
            ->where('product_id', $product_id)
            ->where('name', $name)
            ->where('instructions', $instructions)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $recipes);
        $recipe = $recipes->first();

        $response->assertRedirect(route('recipe.index'));
        $response->assertSessionHas('recipe.id', $recipe->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->get(route('recipe.show', $recipe));

        $response->assertOk();
        $response->assertViewIs('recipe.show');
        $response->assertViewHas('recipe');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->get(route('recipe.edit', $recipe));

        $response->assertOk();
        $response->assertViewIs('recipe.edit');
        $response->assertViewHas('recipe');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipeController::class,
            'update',
            \App\Http\Requests\RecipeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $recipe = Recipe::factory()->create();
        $product_id = $this->faker->randomNumber();
        $name = $this->faker->name;
        $instructions = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->put(route('recipe.update', $recipe), [
            'product_id' => $product_id,
            'name' => $name,
            'instructions' => $instructions,
            'status' => $status,
        ]);

        $recipe->refresh();

        $response->assertRedirect(route('recipe.index'));
        $response->assertSessionHas('recipe.id', $recipe->id);

        $this->assertEquals($product_id, $recipe->product_id);
        $this->assertEquals($name, $recipe->name);
        $this->assertEquals($instructions, $recipe->instructions);
        $this->assertEquals($status, $recipe->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->delete(route('recipe.destroy', $recipe));

        $response->assertRedirect(route('recipe.index'));

        $this->assertSoftDeleted($recipe);
    }
}
