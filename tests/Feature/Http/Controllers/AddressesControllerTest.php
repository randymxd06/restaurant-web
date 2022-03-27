<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Address;
use App\Models\Entity;
use App\Models\Sector;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AddressesController
 */
class AddressesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $addresses = Addresses::factory()->count(3)->create();

        $response = $this->get(route('address.index'));

        $response->assertOk();
        $response->assertViewIs('address.index');
        $response->assertViewHas('addresses');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('address.create'));

        $response->assertOk();
        $response->assertViewIs('address.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AddressesController::class,
            'store',
            \App\Http\Requests\AddressesStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $entity = Entity::factory()->create();
        $sector = Sector::factory()->create();
        $reference = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->post(route('address.store'), [
            'entity_id' => $entity->id,
            'sector_id' => $sector->id,
            'reference' => $reference,
            'status' => $status,
        ]);

        $addresses = Address::query()
            ->where('entity_id', $entity->id)
            ->where('sector_id', $sector->id)
            ->where('reference', $reference)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $addresses);
        $address = $addresses->first();

        $response->assertRedirect(route('address.index'));
        $response->assertSessionHas('address.id', $address->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $address = Addresses::factory()->create();

        $response = $this->get(route('address.show', $address));

        $response->assertOk();
        $response->assertViewIs('address.show');
        $response->assertViewHas('address');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $address = Addresses::factory()->create();

        $response = $this->get(route('address.edit', $address));

        $response->assertOk();
        $response->assertViewIs('address.edit');
        $response->assertViewHas('address');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AddressesController::class,
            'update',
            \App\Http\Requests\AddressesUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $address = Addresses::factory()->create();
        $entity = Entity::factory()->create();
        $sector = Sector::factory()->create();
        $reference = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->put(route('address.update', $address), [
            'entity_id' => $entity->id,
            'sector_id' => $sector->id,
            'reference' => $reference,
            'status' => $status,
        ]);

        $address->refresh();

        $response->assertRedirect(route('address.index'));
        $response->assertSessionHas('address.id', $address->id);

        $this->assertEquals($entity->id, $address->entity_id);
        $this->assertEquals($sector->id, $address->sector_id);
        $this->assertEquals($reference, $address->reference);
        $this->assertEquals($status, $address->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $address = Addresses::factory()->create();
        $address = Address::factory()->create();

        $response = $this->delete(route('address.destroy', $address));

        $response->assertRedirect(route('address.index'));

        $this->assertSoftDeleted($address);
    }
}
