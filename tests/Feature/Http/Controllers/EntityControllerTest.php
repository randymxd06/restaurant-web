<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Entity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EntityController
 */
class EntityControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $entities = Entity::factory()->count(3)->create();

        $response = $this->get(route('entity.index'));

        $response->assertOk();
        $response->assertViewIs('entity.index');
        $response->assertViewHas('entities');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('entity.create'));

        $response->assertOk();
        $response->assertViewIs('entity.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EntityController::class,
            'store',
            \App\Http\Requests\EntityStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
        $identification = $this->faker->word;
        $sex_id = $this->faker->randomNumber();
        $civil_status_id = $this->faker->randomNumber();
        $nationality_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->post(route('entity.store'), [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'identification' => $identification,
            'sex_id' => $sex_id,
            'civil_status_id' => $civil_status_id,
            'nationality_id' => $nationality_id,
            'status' => $status,
        ]);

        $entities = Entity::query()
            ->where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('identification', $identification)
            ->where('sex_id', $sex_id)
            ->where('civil_status_id', $civil_status_id)
            ->where('nationality_id', $nationality_id)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $entities);
        $entity = $entities->first();

        $response->assertRedirect(route('entity.index'));
        $response->assertSessionHas('entity.id', $entity->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $entity = Entity::factory()->create();

        $response = $this->get(route('entity.show', $entity));

        $response->assertOk();
        $response->assertViewIs('entity.show');
        $response->assertViewHas('entity');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $entity = Entity::factory()->create();

        $response = $this->get(route('entity.edit', $entity));

        $response->assertOk();
        $response->assertViewIs('entity.edit');
        $response->assertViewHas('entity');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EntityController::class,
            'update',
            \App\Http\Requests\EntityUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $entity = Entity::factory()->create();
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
        $identification = $this->faker->word;
        $sex_id = $this->faker->randomNumber();
        $civil_status_id = $this->faker->randomNumber();
        $nationality_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->put(route('entity.update', $entity), [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'identification' => $identification,
            'sex_id' => $sex_id,
            'civil_status_id' => $civil_status_id,
            'nationality_id' => $nationality_id,
            'status' => $status,
        ]);

        $entity->refresh();

        $response->assertRedirect(route('entity.index'));
        $response->assertSessionHas('entity.id', $entity->id);

        $this->assertEquals($first_name, $entity->first_name);
        $this->assertEquals($last_name, $entity->last_name);
        $this->assertEquals($identification, $entity->identification);
        $this->assertEquals($sex_id, $entity->sex_id);
        $this->assertEquals($civil_status_id, $entity->civil_status_id);
        $this->assertEquals($nationality_id, $entity->nationality_id);
        $this->assertEquals($status, $entity->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $entity = Entity::factory()->create();

        $response = $this->delete(route('entity.destroy', $entity));

        $response->assertRedirect(route('entity.index'));

        $this->assertSoftDeleted($entity);
    }
}
