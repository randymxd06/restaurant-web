<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NationalityController
 */
class NationalityControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $nationalities = Nationality::factory()->count(3)->create();

        $response = $this->get(route('nationality.index'));

        $response->assertOk();
        $response->assertViewIs('nationality.index');
        $response->assertViewHas('nationalities');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('nationality.create'));

        $response->assertOk();
        $response->assertViewIs('nationality.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NationalityController::class,
            'store',
            \App\Http\Requests\NationalityStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->post(route('nationality.store'), [
            'name' => $name,
            'description' => $description,
            'status' => $status,
        ]);

        $nationalities = Nationality::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $nationalities);
        $nationality = $nationalities->first();

        $response->assertRedirect(route('nationality.index'));
        $response->assertSessionHas('nationality.id', $nationality->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $nationality = Nationality::factory()->create();

        $response = $this->get(route('nationality.show', $nationality));

        $response->assertOk();
        $response->assertViewIs('nationality.show');
        $response->assertViewHas('nationality');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $nationality = Nationality::factory()->create();

        $response = $this->get(route('nationality.edit', $nationality));

        $response->assertOk();
        $response->assertViewIs('nationality.edit');
        $response->assertViewHas('nationality');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NationalityController::class,
            'update',
            \App\Http\Requests\NationalityUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $nationality = Nationality::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->put(route('nationality.update', $nationality), [
            'name' => $name,
            'description' => $description,
            'status' => $status,
        ]);

        $nationality->refresh();

        $response->assertRedirect(route('nationality.index'));
        $response->assertSessionHas('nationality.id', $nationality->id);

        $this->assertEquals($name, $nationality->name);
        $this->assertEquals($description, $nationality->description);
        $this->assertEquals($status, $nationality->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $nationality = Nationality::factory()->create();

        $response = $this->delete(route('nationality.destroy', $nationality));

        $response->assertRedirect(route('nationality.index'));

        $this->assertSoftDeleted($nationality);
    }
}
