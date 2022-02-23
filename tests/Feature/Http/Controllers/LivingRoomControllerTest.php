<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LivingRoom;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LivingRoomController
 */
class LivingRoomControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $livingRooms = LivingRoom::factory()->count(3)->create();

        $response = $this->get(route('living-room.index'));

        $response->assertOk();
        $response->assertViewIs('livingRoom.index');
        $response->assertViewHas('livingRooms');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('living-room.create'));

        $response->assertOk();
        $response->assertViewIs('livingRoom.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LivingRoomController::class,
            'store',
            \App\Http\Requests\LivingRoomStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $tables_capacity = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->post(route('living-room.store'), [
            'name' => $name,
            'description' => $description,
            'tables_capacity' => $tables_capacity,
            'status' => $status,
        ]);

        $livingRooms = LivingRoom::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('tables_capacity', $tables_capacity)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $livingRooms);
        $livingRoom = $livingRooms->first();

        $response->assertRedirect(route('livingRoom.index'));
        $response->assertSessionHas('livingRoom.id', $livingRoom->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $livingRoom = LivingRoom::factory()->create();

        $response = $this->get(route('living-room.show', $livingRoom));

        $response->assertOk();
        $response->assertViewIs('livingRoom.show');
        $response->assertViewHas('livingRoom');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $livingRoom = LivingRoom::factory()->create();

        $response = $this->get(route('living-room.edit', $livingRoom));

        $response->assertOk();
        $response->assertViewIs('livingRoom.edit');
        $response->assertViewHas('livingRoom');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LivingRoomController::class,
            'update',
            \App\Http\Requests\LivingRoomUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $livingRoom = LivingRoom::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $tables_capacity = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->put(route('living-room.update', $livingRoom), [
            'name' => $name,
            'description' => $description,
            'tables_capacity' => $tables_capacity,
            'status' => $status,
        ]);

        $livingRoom->refresh();

        $response->assertRedirect(route('livingRoom.index'));
        $response->assertSessionHas('livingRoom.id', $livingRoom->id);

        $this->assertEquals($name, $livingRoom->name);
        $this->assertEquals($description, $livingRoom->description);
        $this->assertEquals($tables_capacity, $livingRoom->tables_capacity);
        $this->assertEquals($status, $livingRoom->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $livingRoom = LivingRoom::factory()->create();

        $response = $this->delete(route('living-room.destroy', $livingRoom));

        $response->assertRedirect(route('livingRoom.index'));

        $this->assertSoftDeleted($livingRoom);
    }
}
