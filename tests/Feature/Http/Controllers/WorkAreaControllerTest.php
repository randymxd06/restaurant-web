<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\WorkArea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\WorkAreaController
 */
class WorkAreaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $workAreas = WorkArea::factory()->count(3)->create();

        $response = $this->get(route('work-area.index'));

        $response->assertOk();
        $response->assertViewIs('workArea.index');
        $response->assertViewHas('workAreas');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('work-area.create'));

        $response->assertOk();
        $response->assertViewIs('workArea.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WorkAreaController::class,
            'store',
            \App\Http\Requests\WorkAreaStoreRequest::class
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

        $response = $this->post(route('work-area.store'), [
            'name' => $name,
            'description' => $description,
            'status' => $status,
        ]);

        $workAreas = WorkArea::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $workAreas);
        $workArea = $workAreas->first();

        $response->assertRedirect(route('workArea.index'));
        $response->assertSessionHas('workArea.id', $workArea->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $workArea = WorkArea::factory()->create();

        $response = $this->get(route('work-area.show', $workArea));

        $response->assertOk();
        $response->assertViewIs('workArea.show');
        $response->assertViewHas('workArea');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $workArea = WorkArea::factory()->create();

        $response = $this->get(route('work-area.edit', $workArea));

        $response->assertOk();
        $response->assertViewIs('workArea.edit');
        $response->assertViewHas('workArea');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WorkAreaController::class,
            'update',
            \App\Http\Requests\WorkAreaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $workArea = WorkArea::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $status = $this->faker->boolean;

        $response = $this->put(route('work-area.update', $workArea), [
            'name' => $name,
            'description' => $description,
            'status' => $status,
        ]);

        $workArea->refresh();

        $response->assertRedirect(route('workArea.index'));
        $response->assertSessionHas('workArea.id', $workArea->id);

        $this->assertEquals($name, $workArea->name);
        $this->assertEquals($description, $workArea->description);
        $this->assertEquals($status, $workArea->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $workArea = WorkArea::factory()->create();

        $response = $this->delete(route('work-area.destroy', $workArea));

        $response->assertRedirect(route('workArea.index'));

        $this->assertSoftDeleted($workArea);
    }
}
