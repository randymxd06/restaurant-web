<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LivingRoom;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Living_RoomController
 */
class Living_RoomControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $livingRooms = Living_Room::factory()->count(3)->create();

        $response = $this->get(route('living_-room.index'));

        $response->assertOk();
        $response->assertViewIs('livingRoom.index');
        $response->assertViewHas('livingRooms');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('living_-room.create'));

        $response->assertOk();
        $response->assertViewIs('livingRoom.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Living_RoomController::class,
            'store',
            \App\Http\Requests\Living_RoomStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('living_-room.store'));

        $response->assertRedirect(route('livingRoom.index'));
        $response->assertSessionHas('livingRoom.id', $livingRoom->id);

        $this->assertDatabaseHas(livingRooms, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $livingRoom = Living_Room::factory()->create();

        $response = $this->get(route('living_-room.show', $livingRoom));

        $response->assertOk();
        $response->assertViewIs('livingRoom.show');
        $response->assertViewHas('livingRoom');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $livingRoom = Living_Room::factory()->create();

        $response = $this->get(route('living_-room.edit', $livingRoom));

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
            \App\Http\Controllers\Living_RoomController::class,
            'update',
            \App\Http\Requests\Living_RoomUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $livingRoom = Living_Room::factory()->create();

        $response = $this->put(route('living_-room.update', $livingRoom));

        $livingRoom->refresh();

        $response->assertRedirect(route('livingRoom.index'));
        $response->assertSessionHas('livingRoom.id', $livingRoom->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $livingRoom = Living_Room::factory()->create();
        $livingRoom = LivingRoom::factory()->create();

        $response = $this->delete(route('living_-room.destroy', $livingRoom));

        $response->assertRedirect(route('livingRoom.index'));

        $this->assertDeleted($livingRoom);
    }
}
