<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Currency;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CurrencyController
 */
class CurrencyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $currencies = Currency::factory()->count(3)->create();

        $response = $this->get(route('currency.index'));

        $response->assertOk();
        $response->assertViewIs('currency.index');
        $response->assertViewHas('currencies');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('currency.create'));

        $response->assertOk();
        $response->assertViewIs('currency.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CurrencyController::class,
            'store',
            \App\Http\Requests\CurrencyStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $symbol = $this->faker->randomLetter;
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->post(route('currency.store'), [
            'name' => $name,
            'symbol' => $symbol,
            'description' => $description,
            'status' => $status,
        ]);

        $currencies = Currency::query()
            ->where('name', $name)
            ->where('symbol', $symbol)
            ->where('description', $description)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $currencies);
        $currency = $currencies->first();

        $response->assertRedirect(route('currency.index'));
        $response->assertSessionHas('currency.id', $currency->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $currency = Currency::factory()->create();

        $response = $this->get(route('currency.show', $currency));

        $response->assertOk();
        $response->assertViewIs('currency.show');
        $response->assertViewHas('currency');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $currency = Currency::factory()->create();

        $response = $this->get(route('currency.edit', $currency));

        $response->assertOk();
        $response->assertViewIs('currency.edit');
        $response->assertViewHas('currency');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CurrencyController::class,
            'update',
            \App\Http\Requests\CurrencyUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $currency = Currency::factory()->create();
        $name = $this->faker->name;
        $symbol = $this->faker->randomLetter;
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->put(route('currency.update', $currency), [
            'name' => $name,
            'symbol' => $symbol,
            'description' => $description,
            'status' => $status,
        ]);

        $currency->refresh();

        $response->assertRedirect(route('currency.index'));
        $response->assertSessionHas('currency.id', $currency->id);

        $this->assertEquals($name, $currency->name);
        $this->assertEquals($symbol, $currency->symbol);
        $this->assertEquals($description, $currency->description);
        $this->assertEquals($status, $currency->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $currency = Currency::factory()->create();

        $response = $this->delete(route('currency.destroy', $currency));

        $response->assertRedirect(route('currency.index'));

        $this->assertSoftDeleted($currency);
    }
}
