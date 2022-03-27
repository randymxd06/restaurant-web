<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Country;
use App\Models\Province;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProvinceController
 */
class ProvinceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $provinces = Province::factory()->count(3)->create();

        $response = $this->get(route('province.index'));

        $response->assertOk();
        $response->assertViewIs('province.index');
        $response->assertViewHas('provinces');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('province.create'));

        $response->assertOk();
        $response->assertViewIs('province.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProvinceController::class,
            'store',
            \App\Http\Requests\ProvinceStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $country = Country::factory()->create();
        $code = $this->faker->word;
        $name = $this->faker->name;
        $status = $this->faker->boolean;

        $response = $this->post(route('province.store'), [
            'country_id' => $country->id,
            'code' => $code,
            'name' => $name,
            'status' => $status,
        ]);

        $provinces = Province::query()
            ->where('country_id', $country->id)
            ->where('code', $code)
            ->where('name', $name)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $provinces);
        $province = $provinces->first();

        $response->assertRedirect(route('province.index'));
        $response->assertSessionHas('province.id', $province->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $province = Province::factory()->create();

        $response = $this->get(route('province.show', $province));

        $response->assertOk();
        $response->assertViewIs('province.show');
        $response->assertViewHas('province');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $province = Province::factory()->create();

        $response = $this->get(route('province.edit', $province));

        $response->assertOk();
        $response->assertViewIs('province.edit');
        $response->assertViewHas('province');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProvinceController::class,
            'update',
            \App\Http\Requests\ProvinceUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $province = Province::factory()->create();
        $country = Country::factory()->create();
        $code = $this->faker->word;
        $name = $this->faker->name;
        $status = $this->faker->boolean;

        $response = $this->put(route('province.update', $province), [
            'country_id' => $country->id,
            'code' => $code,
            'name' => $name,
            'status' => $status,
        ]);

        $province->refresh();

        $response->assertRedirect(route('province.index'));
        $response->assertSessionHas('province.id', $province->id);

        $this->assertEquals($country->id, $province->country_id);
        $this->assertEquals($code, $province->code);
        $this->assertEquals($name, $province->name);
        $this->assertEquals($status, $province->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $province = Province::factory()->create();

        $response = $this->delete(route('province.destroy', $province));

        $response->assertRedirect(route('province.index'));

        $this->assertSoftDeleted($province);
    }
}
