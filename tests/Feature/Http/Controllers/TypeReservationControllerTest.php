<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TypeReservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TypeReservationController
 */
class TypeReservationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $typeReservations = TypeReservation::factory()->count(3)->create();

        $response = $this->get(route('type-reservation.index'));

        $response->assertOk();
        $response->assertViewIs('typeReservation.index');
        $response->assertViewHas('typeReservations');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('type-reservation.create'));

        $response->assertOk();
        $response->assertViewIs('typeReservation.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeReservationController::class,
            'store',
            \App\Http\Requests\TypeReservationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $description = $this->faker->text;

        $response = $this->post(route('type-reservation.store'), [
            'name' => $name,
            'description' => $description,
        ]);

        $typeReservations = TypeReservation::query()
            ->where('name', $name)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $typeReservations);
        $typeReservation = $typeReservations->first();

        $response->assertRedirect(route('typeReservation.index'));
        $response->assertSessionHas('typeReservation.id', $typeReservation->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $typeReservation = TypeReservation::factory()->create();

        $response = $this->get(route('type-reservation.show', $typeReservation));

        $response->assertOk();
        $response->assertViewIs('typeReservation.show');
        $response->assertViewHas('typeReservation');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $typeReservation = TypeReservation::factory()->create();

        $response = $this->get(route('type-reservation.edit', $typeReservation));

        $response->assertOk();
        $response->assertViewIs('typeReservation.edit');
        $response->assertViewHas('typeReservation');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeReservationController::class,
            'update',
            \App\Http\Requests\TypeReservationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $typeReservation = TypeReservation::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;

        $response = $this->put(route('type-reservation.update', $typeReservation), [
            'name' => $name,
            'description' => $description,
        ]);

        $typeReservation->refresh();

        $response->assertRedirect(route('typeReservation.index'));
        $response->assertSessionHas('typeReservation.id', $typeReservation->id);

        $this->assertEquals($name, $typeReservation->name);
        $this->assertEquals($description, $typeReservation->description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $typeReservation = TypeReservation::factory()->create();

        $response = $this->delete(route('type-reservation.destroy', $typeReservation));

        $response->assertRedirect(route('typeReservation.index'));

        $this->assertSoftDeleted($typeReservation);
    }
}
