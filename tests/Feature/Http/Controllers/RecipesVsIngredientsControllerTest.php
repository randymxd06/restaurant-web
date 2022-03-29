<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\RecipesVsIngredient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RecipesVsIngredientsController
 */
class RecipesVsIngredientsControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $recipesVsIngredients = RecipesVsIngredients::factory()->count(3)->create();

        $response = $this->get(route('recipes-vs-ingredient.index'));

        $response->assertOk();
        $response->assertViewIs('recipesVsIngredient.index');
        $response->assertViewHas('recipesVsIngredients');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('recipes-vs-ingredient.create'));

        $response->assertOk();
        $response->assertViewIs('recipesVsIngredient.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipesVsIngredientsController::class,
            'store',
            \App\Http\Requests\RecipesVsIngredientsStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $ingredients_id = $this->faker->randomNumber();
        $quantity = $this->faker->randomNumber();
        $unit_measurement_id = $this->faker->randomNumber();
        $description = $this->faker->text;

        $response = $this->post(route('recipes-vs-ingredient.store'), [
            'ingredients_id' => $ingredients_id,
            'quantity' => $quantity,
            'unit_measurement_id' => $unit_measurement_id,
            'description' => $description,
        ]);

        $recipesVsIngredients = RecipesVsIngredient::query()
            ->where('ingredients_id', $ingredients_id)
            ->where('quantity', $quantity)
            ->where('unit_measurement_id', $unit_measurement_id)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $recipesVsIngredients);
        $recipesVsIngredient = $recipesVsIngredients->first();

        $response->assertRedirect(route('recipesVsIngredient.index'));
        $response->assertSessionHas('recipesVsIngredient.id', $recipesVsIngredient->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $recipesVsIngredient = RecipesVsIngredients::factory()->create();

        $response = $this->get(route('recipes-vs-ingredient.show', $recipesVsIngredient));

        $response->assertOk();
        $response->assertViewIs('recipesVsIngredient.show');
        $response->assertViewHas('recipesVsIngredient');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $recipesVsIngredient = RecipesVsIngredients::factory()->create();

        $response = $this->get(route('recipes-vs-ingredient.edit', $recipesVsIngredient));

        $response->assertOk();
        $response->assertViewIs('recipesVsIngredient.edit');
        $response->assertViewHas('recipesVsIngredient');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipesVsIngredientsController::class,
            'update',
            \App\Http\Requests\RecipesVsIngredientsUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $recipesVsIngredient = RecipesVsIngredients::factory()->create();
        $ingredients_id = $this->faker->randomNumber();
        $quantity = $this->faker->randomNumber();
        $unit_measurement_id = $this->faker->randomNumber();
        $description = $this->faker->text;

        $response = $this->put(route('recipes-vs-ingredient.update', $recipesVsIngredient), [
            'ingredients_id' => $ingredients_id,
            'quantity' => $quantity,
            'unit_measurement_id' => $unit_measurement_id,
            'description' => $description,
        ]);

        $recipesVsIngredient->refresh();

        $response->assertRedirect(route('recipesVsIngredient.index'));
        $response->assertSessionHas('recipesVsIngredient.id', $recipesVsIngredient->id);

        $this->assertEquals($ingredients_id, $recipesVsIngredient->ingredients_id);
        $this->assertEquals($quantity, $recipesVsIngredient->quantity);
        $this->assertEquals($unit_measurement_id, $recipesVsIngredient->unit_measurement_id);
        $this->assertEquals($description, $recipesVsIngredient->description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $recipesVsIngredient = RecipesVsIngredients::factory()->create();
        $recipesVsIngredient = RecipesVsIngredient::factory()->create();

        $response = $this->delete(route('recipes-vs-ingredient.destroy', $recipesVsIngredient));

        $response->assertRedirect(route('recipesVsIngredient.index'));

        $this->assertSoftDeleted($recipesVsIngredient);
    }
}
