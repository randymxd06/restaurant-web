<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ReservationController
 */
class ReservationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $reservations = Reservation::factory()->count(3)->create();

        $response = $this->get(route('reservation.index'));

        $response->assertOk();
        $response->assertViewIs('reservation.index');
        $response->assertViewHas('reservations');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('reservation.create'));

        $response->assertOk();
        $response->assertViewIs('reservation.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReservationController::class,
            'store',
            \App\Http\Requests\ReservationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $customers_id = $this->faker->randomNumber();
        $type_reservations_id = $this->faker->randomNumber();
        $living_room_id = $this->faker->randomNumber();
        $date_time = $this->faker->dateTime();
        $number_people = $this->faker->word;
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->post(route('reservation.store'), [
            'customers_id' => $customers_id,
            'type_reservations_id' => $type_reservations_id,
            'living_room_id' => $living_room_id,
            'date_time' => $date_time,
            'number_people' => $number_people,
            'description' => $description,
            'status' => $status,
        ]);

        $reservations = Reservation::query()
            ->where('customers_id', $customers_id)
            ->where('type_reservations_id', $type_reservations_id)
            ->where('living_room_id', $living_room_id)
            ->where('date_time', $date_time)
            ->where('number_people', $number_people)
            ->where('description', $description)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $reservations);
        $reservation = $reservations->first();

        $response->assertRedirect(route('reservation.index'));
        $response->assertSessionHas('reservation.id', $reservation->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $reservation = Reservation::factory()->create();

        $response = $this->get(route('reservation.show', $reservation));

        $response->assertOk();
        $response->assertViewIs('reservation.show');
        $response->assertViewHas('reservation');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $reservation = Reservation::factory()->create();

        $response = $this->get(route('reservation.edit', $reservation));

        $response->assertOk();
        $response->assertViewIs('reservation.edit');
        $response->assertViewHas('reservation');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReservationController::class,
            'update',
            \App\Http\Requests\ReservationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $reservation = Reservation::factory()->create();
        $customers_id = $this->faker->randomNumber();
        $type_reservations_id = $this->faker->randomNumber();
        $living_room_id = $this->faker->randomNumber();
        $date_time = $this->faker->dateTime();
        $number_people = $this->faker->word;
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->put(route('reservation.update', $reservation), [
            'customers_id' => $customers_id,
            'type_reservations_id' => $type_reservations_id,
            'living_room_id' => $living_room_id,
            'date_time' => $date_time,
            'number_people' => $number_people,
            'description' => $description,
            'status' => $status,
        ]);

        $reservation->refresh();

        $response->assertRedirect(route('reservation.index'));
        $response->assertSessionHas('reservation.id', $reservation->id);

        $this->assertEquals($customers_id, $reservation->customers_id);
        $this->assertEquals($type_reservations_id, $reservation->type_reservations_id);
        $this->assertEquals($living_room_id, $reservation->living_room_id);
        $this->assertEquals($date_time, $reservation->date_time);
        $this->assertEquals($number_people, $reservation->number_people);
        $this->assertEquals($description, $reservation->description);
        $this->assertEquals($status, $reservation->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $reservation = Reservation::factory()->create();

        $response = $this->delete(route('reservation.destroy', $reservation));

        $response->assertRedirect(route('reservation.index'));

        $this->assertSoftDeleted($reservation);
    }
}
