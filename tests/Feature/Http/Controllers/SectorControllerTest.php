<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\City;
use App\Models\Sector;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SectorController
 */
class SectorControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $sectors = Sector::factory()->count(3)->create();

        $response = $this->get(route('sector.index'));

        $response->assertOk();
        $response->assertViewIs('sector.index');
        $response->assertViewHas('sectors');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('sector.create'));

        $response->assertOk();
        $response->assertViewIs('sector.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SectorController::class,
            'store',
            \App\Http\Requests\SectorStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $city = City::factory()->create();
        $name = $this->faker->name;
        $status = $this->faker->boolean;

        $response = $this->post(route('sector.store'), [
            'city_id' => $city->id,
            'name' => $name,
            'status' => $status,
        ]);

        $sectors = Sector::query()
            ->where('city_id', $city->id)
            ->where('name', $name)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $sectors);
        $sector = $sectors->first();

        $response->assertRedirect(route('sector.index'));
        $response->assertSessionHas('sector.id', $sector->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $sector = Sector::factory()->create();

        $response = $this->get(route('sector.show', $sector));

        $response->assertOk();
        $response->assertViewIs('sector.show');
        $response->assertViewHas('sector');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $sector = Sector::factory()->create();

        $response = $this->get(route('sector.edit', $sector));

        $response->assertOk();
        $response->assertViewIs('sector.edit');
        $response->assertViewHas('sector');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SectorController::class,
            'update',
            \App\Http\Requests\SectorUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $sector = Sector::factory()->create();
        $city = City::factory()->create();
        $name = $this->faker->name;
        $status = $this->faker->boolean;

        $response = $this->put(route('sector.update', $sector), [
            'city_id' => $city->id,
            'name' => $name,
            'status' => $status,
        ]);

        $sector->refresh();

        $response->assertRedirect(route('sector.index'));
        $response->assertSessionHas('sector.id', $sector->id);

        $this->assertEquals($city->id, $sector->city_id);
        $this->assertEquals($name, $sector->name);
        $this->assertEquals($status, $sector->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $sector = Sector::factory()->create();

        $response = $this->delete(route('sector.destroy', $sector));

        $response->assertRedirect(route('sector.index'));

        $this->assertSoftDeleted($sector);
    }
}
