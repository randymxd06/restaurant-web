<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\UnitsMeasurement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UnitsMeasurementController
 */
class UnitsMeasurementControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $unitsMeasurements = UnitsMeasurement::factory()->count(3)->create();

        $response = $this->get(route('units-measurement.index'));

        $response->assertOk();
        $response->assertViewIs('unitsMeasurement.index');
        $response->assertViewHas('unitsMeasurements');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('units-measurement.create'));

        $response->assertOk();
        $response->assertViewIs('unitsMeasurement.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UnitsMeasurementController::class,
            'store',
            \App\Http\Requests\UnitsMeasurementStoreRequest::class
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

        $response = $this->post(route('units-measurement.store'), [
            'name' => $name,
            'symbol' => $symbol,
            'description' => $description,
        ]);

        $unitsMeasurements = UnitsMeasurement::query()
            ->where('name', $name)
            ->where('symbol', $symbol)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $unitsMeasurements);
        $unitsMeasurement = $unitsMeasurements->first();

        $response->assertRedirect(route('unitsMeasurement.index'));
        $response->assertSessionHas('unitsMeasurement.id', $unitsMeasurement->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $unitsMeasurement = UnitsMeasurement::factory()->create();

        $response = $this->get(route('units-measurement.show', $unitsMeasurement));

        $response->assertOk();
        $response->assertViewIs('unitsMeasurement.show');
        $response->assertViewHas('unitsMeasurement');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $unitsMeasurement = UnitsMeasurement::factory()->create();

        $response = $this->get(route('units-measurement.edit', $unitsMeasurement));

        $response->assertOk();
        $response->assertViewIs('unitsMeasurement.edit');
        $response->assertViewHas('unitsMeasurement');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UnitsMeasurementController::class,
            'update',
            \App\Http\Requests\UnitsMeasurementUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $unitsMeasurement = UnitsMeasurement::factory()->create();
        $name = $this->faker->name;
        $symbol = $this->faker->randomLetter;
        $description = $this->faker->text;

        $response = $this->put(route('units-measurement.update', $unitsMeasurement), [
            'name' => $name,
            'symbol' => $symbol,
            'description' => $description,
        ]);

        $unitsMeasurement->refresh();

        $response->assertRedirect(route('unitsMeasurement.index'));
        $response->assertSessionHas('unitsMeasurement.id', $unitsMeasurement->id);

        $this->assertEquals($name, $unitsMeasurement->name);
        $this->assertEquals($symbol, $unitsMeasurement->symbol);
        $this->assertEquals($description, $unitsMeasurement->description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $unitsMeasurement = UnitsMeasurement::factory()->create();

        $response = $this->delete(route('units-measurement.destroy', $unitsMeasurement));

        $response->assertRedirect(route('unitsMeasurement.index'));

        $this->assertSoftDeleted($unitsMeasurement);
    }
}
