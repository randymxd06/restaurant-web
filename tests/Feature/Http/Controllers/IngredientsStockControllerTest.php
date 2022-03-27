<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\IngredientsStock;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\IngredientsStockController
 */
class IngredientsStockControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $ingredientsStocks = IngredientsStock::factory()->count(3)->create();

        $response = $this->get(route('ingredients-stock.index'));

        $response->assertOk();
        $response->assertViewIs('ingredientsStock.index');
        $response->assertViewHas('ingredientsStocks');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('ingredients-stock.create'));

        $response->assertOk();
        $response->assertViewIs('ingredientsStock.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\IngredientsStockController::class,
            'store',
            \App\Http\Requests\IngredientsStockStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $ingredient_id = $this->faker->randomNumber();
        $quantity = $this->faker->word;
        $unit_measurement_id = $this->faker->randomNumber();
        $arrival_date = $this->faker->date();
        $expiration_date = $this->faker->date();

        $response = $this->post(route('ingredients-stock.store'), [
            'ingredient_id' => $ingredient_id,
            'quantity' => $quantity,
            'unit_measurement_id' => $unit_measurement_id,
            'arrival_date' => $arrival_date,
            'expiration_date' => $expiration_date,
        ]);

        $ingredientsStocks = IngredientsStock::query()
            ->where('ingredient_id', $ingredient_id)
            ->where('quantity', $quantity)
            ->where('unit_measurement_id', $unit_measurement_id)
            ->where('arrival_date', $arrival_date)
            ->where('expiration_date', $expiration_date)
            ->get();
        $this->assertCount(1, $ingredientsStocks);
        $ingredientsStock = $ingredientsStocks->first();

        $response->assertRedirect(route('ingredientsStock.index'));
        $response->assertSessionHas('ingredientsStock.id', $ingredientsStock->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $ingredientsStock = IngredientsStock::factory()->create();

        $response = $this->get(route('ingredients-stock.show', $ingredientsStock));

        $response->assertOk();
        $response->assertViewIs('ingredientsStock.show');
        $response->assertViewHas('ingredientsStock');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $ingredientsStock = IngredientsStock::factory()->create();

        $response = $this->get(route('ingredients-stock.edit', $ingredientsStock));

        $response->assertOk();
        $response->assertViewIs('ingredientsStock.edit');
        $response->assertViewHas('ingredientsStock');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\IngredientsStockController::class,
            'update',
            \App\Http\Requests\IngredientsStockUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $ingredientsStock = IngredientsStock::factory()->create();
        $ingredient_id = $this->faker->randomNumber();
        $quantity = $this->faker->word;
        $unit_measurement_id = $this->faker->randomNumber();
        $arrival_date = $this->faker->date();
        $expiration_date = $this->faker->date();

        $response = $this->put(route('ingredients-stock.update', $ingredientsStock), [
            'ingredient_id' => $ingredient_id,
            'quantity' => $quantity,
            'unit_measurement_id' => $unit_measurement_id,
            'arrival_date' => $arrival_date,
            'expiration_date' => $expiration_date,
        ]);

        $ingredientsStock->refresh();

        $response->assertRedirect(route('ingredientsStock.index'));
        $response->assertSessionHas('ingredientsStock.id', $ingredientsStock->id);

        $this->assertEquals($ingredient_id, $ingredientsStock->ingredient_id);
        $this->assertEquals($quantity, $ingredientsStock->quantity);
        $this->assertEquals($unit_measurement_id, $ingredientsStock->unit_measurement_id);
        $this->assertEquals(Carbon::parse($arrival_date), $ingredientsStock->arrival_date);
        $this->assertEquals(Carbon::parse($expiration_date), $ingredientsStock->expiration_date);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $ingredientsStock = IngredientsStock::factory()->create();

        $response = $this->delete(route('ingredients-stock.destroy', $ingredientsStock));

        $response->assertRedirect(route('ingredientsStock.index'));

        $this->assertSoftDeleted($ingredientsStock);
    }
}
