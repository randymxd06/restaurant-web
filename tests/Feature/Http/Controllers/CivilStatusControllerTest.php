<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\CivilStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CivilStatusController
 */
class CivilStatusControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $civilStatuses = CivilStatus::factory()->count(3)->create();

        $response = $this->get(route('civil-status.index'));

        $response->assertOk();
        $response->assertViewIs('civilStatus.index');
        $response->assertViewHas('civilStatuses');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('civil-status.create'));

        $response->assertOk();
        $response->assertViewIs('civilStatus.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CivilStatusController::class,
            'store',
            \App\Http\Requests\CivilStatusStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->post(route('civil-status.store'), [
            'description' => $description,
            'status' => $status,
        ]);

        $civilStatuses = CivilStatus::query()
            ->where('description', $description)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $civilStatuses);
        $civilStatus = $civilStatuses->first();

        $response->assertRedirect(route('civilStatus.index'));
        $response->assertSessionHas('civilStatus.id', $civilStatus->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $civilStatus = CivilStatus::factory()->create();

        $response = $this->get(route('civil-status.show', $civilStatus));

        $response->assertOk();
        $response->assertViewIs('civilStatus.show');
        $response->assertViewHas('civilStatus');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $civilStatus = CivilStatus::factory()->create();

        $response = $this->get(route('civil-status.edit', $civilStatus));

        $response->assertOk();
        $response->assertViewIs('civilStatus.edit');
        $response->assertViewHas('civilStatus');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CivilStatusController::class,
            'update',
            \App\Http\Requests\CivilStatusUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $civilStatus = CivilStatus::factory()->create();
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->put(route('civil-status.update', $civilStatus), [
            'description' => $description,
            'status' => $status,
        ]);

        $civilStatus->refresh();

        $response->assertRedirect(route('civilStatus.index'));
        $response->assertSessionHas('civilStatus.id', $civilStatus->id);

        $this->assertEquals($description, $civilStatus->description);
        $this->assertEquals($status, $civilStatus->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $civilStatus = CivilStatus::factory()->create();

        $response = $this->delete(route('civil-status.destroy', $civilStatus));

        $response->assertRedirect(route('civilStatus.index'));

        $this->assertSoftDeleted($civilStatus);
    }
}
