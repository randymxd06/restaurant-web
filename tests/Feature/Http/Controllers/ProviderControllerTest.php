<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProviderController
 */
class ProviderControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $providers = Provider::factory()->count(3)->create();

        $response = $this->get(route('provider.index'));

        $response->assertOk();
        $response->assertViewIs('provider.index');
        $response->assertViewHas('providers');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('provider.create'));

        $response->assertOk();
        $response->assertViewIs('provider.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProviderController::class,
            'store',
            \App\Http\Requests\ProviderStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $entity_id = $this->faker->randomNumber();
        $company_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->post(route('provider.store'), [
            'entity_id' => $entity_id,
            'company_id' => $company_id,
            'status' => $status,
        ]);

        $providers = Provider::query()
            ->where('entity_id', $entity_id)
            ->where('company_id', $company_id)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $providers);
        $provider = $providers->first();

        $response->assertRedirect(route('provider.index'));
        $response->assertSessionHas('provider.id', $provider->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $provider = Provider::factory()->create();

        $response = $this->get(route('provider.show', $provider));

        $response->assertOk();
        $response->assertViewIs('provider.show');
        $response->assertViewHas('provider');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $provider = Provider::factory()->create();

        $response = $this->get(route('provider.edit', $provider));

        $response->assertOk();
        $response->assertViewIs('provider.edit');
        $response->assertViewHas('provider');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProviderController::class,
            'update',
            \App\Http\Requests\ProviderUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $provider = Provider::factory()->create();
        $entity_id = $this->faker->randomNumber();
        $company_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->put(route('provider.update', $provider), [
            'entity_id' => $entity_id,
            'company_id' => $company_id,
            'status' => $status,
        ]);

        $provider->refresh();

        $response->assertRedirect(route('provider.index'));
        $response->assertSessionHas('provider.id', $provider->id);

        $this->assertEquals($entity_id, $provider->entity_id);
        $this->assertEquals($company_id, $provider->company_id);
        $this->assertEquals($status, $provider->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $provider = Provider::factory()->create();

        $response = $this->delete(route('provider.destroy', $provider));

        $response->assertRedirect(route('provider.index'));

        $this->assertSoftDeleted($provider);
    }
}
