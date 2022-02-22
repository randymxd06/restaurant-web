<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Box;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BoxController
 */
class BoxControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $boxes = Box::factory()->count(3)->create();

        $response = $this->get(route('box.index'));

        $response->assertOk();
        $response->assertViewIs('box.index');
        $response->assertViewHas('boxes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('box.create'));

        $response->assertOk();
        $response->assertViewIs('box.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BoxController::class,
            'store',
            \App\Http\Requests\BoxStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $start_time = $this->faker->time();
        $end_time = $this->faker->time();
        $status = $this->faker->boolean;

        $response = $this->post(route('box.store'), [
            'start_time' => $start_time,
            'end_time' => $end_time,
            'status' => $status,
        ]);

        $boxes = Box::query()
            ->where('start_time', $start_time)
            ->where('end_time', $end_time)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $boxes);
        $box = $boxes->first();

        $response->assertRedirect(route('box.index'));
        $response->assertSessionHas('box.id', $box->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $box = Box::factory()->create();

        $response = $this->get(route('box.show', $box));

        $response->assertOk();
        $response->assertViewIs('box.show');
        $response->assertViewHas('box');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $box = Box::factory()->create();

        $response = $this->get(route('box.edit', $box));

        $response->assertOk();
        $response->assertViewIs('box.edit');
        $response->assertViewHas('box');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BoxController::class,
            'update',
            \App\Http\Requests\BoxUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $box = Box::factory()->create();
        $start_time = $this->faker->time();
        $end_time = $this->faker->time();
        $status = $this->faker->boolean;

        $response = $this->put(route('box.update', $box), [
            'start_time' => $start_time,
            'end_time' => $end_time,
            'status' => $status,
        ]);

        $box->refresh();

        $response->assertRedirect(route('box.index'));
        $response->assertSessionHas('box.id', $box->id);

        $this->assertEquals($start_time, $box->start_time);
        $this->assertEquals($end_time, $box->end_time);
        $this->assertEquals($status, $box->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $box = Box::factory()->create();

        $response = $this->delete(route('box.destroy', $box));

        $response->assertRedirect(route('box.index'));

        $this->assertDeleted($box);
    }
}
