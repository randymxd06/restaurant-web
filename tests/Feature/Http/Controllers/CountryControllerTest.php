<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CountryController
 */
class CountryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $countries = Country::factory()->count(3)->create();

        $response = $this->get(route('country.index'));

        $response->assertOk();
        $response->assertViewIs('country.index');
        $response->assertViewHas('countries');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('country.create'));

        $response->assertOk();
        $response->assertViewIs('country.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CountryController::class,
            'store',
            \App\Http\Requests\CountryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $iso_code = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->post(route('country.store'), [
            'name' => $name,
            'iso_code' => $iso_code,
            'status' => $status,
        ]);

        $countries = Country::query()
            ->where('name', $name)
            ->where('iso_code', $iso_code)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $countries);
        $country = $countries->first();

        $response->assertRedirect(route('country.index'));
        $response->assertSessionHas('country.id', $country->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $country = Country::factory()->create();

        $response = $this->get(route('country.show', $country));

        $response->assertOk();
        $response->assertViewIs('country.show');
        $response->assertViewHas('country');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $country = Country::factory()->create();

        $response = $this->get(route('country.edit', $country));

        $response->assertOk();
        $response->assertViewIs('country.edit');
        $response->assertViewHas('country');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CountryController::class,
            'update',
            \App\Http\Requests\CountryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $country = Country::factory()->create();
        $name = $this->faker->name;
        $iso_code = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->put(route('country.update', $country), [
            'name' => $name,
            'iso_code' => $iso_code,
            'status' => $status,
        ]);

        $country->refresh();

        $response->assertRedirect(route('country.index'));
        $response->assertSessionHas('country.id', $country->id);

        $this->assertEquals($name, $country->name);
        $this->assertEquals($iso_code, $country->iso_code);
        $this->assertEquals($status, $country->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $country = Country::factory()->create();

        $response = $this->delete(route('country.destroy', $country));

        $response->assertRedirect(route('country.index'));

        $this->assertSoftDeleted($country);
    }
}
