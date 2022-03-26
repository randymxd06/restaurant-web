<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\BoxHistory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BoxHistoryController
 */
class BoxHistoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $boxHistories = BoxHistory::factory()->count(3)->create();

        $response = $this->get(route('box-history.index'));

        $response->assertOk();
        $response->assertViewIs('boxHistory.index');
        $response->assertViewHas('boxHistories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('box-history.create'));

        $response->assertOk();
        $response->assertViewIs('boxHistory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BoxHistoryController::class,
            'store',
            \App\Http\Requests\BoxHistoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $box_id = $this->faker->randomNumber();
        $start_time = $this->faker->time();
        $end_time = $this->faker->time();

        $response = $this->post(route('box-history.store'), [
            'box_id' => $box_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        $boxHistories = BoxHistory::query()
            ->where('box_id', $box_id)
            ->where('start_time', $start_time)
            ->where('end_time', $end_time)
            ->get();
        $this->assertCount(1, $boxHistories);
        $boxHistory = $boxHistories->first();

        $response->assertRedirect(route('boxHistory.index'));
        $response->assertSessionHas('boxHistory.id', $boxHistory->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $boxHistory = BoxHistory::factory()->create();

        $response = $this->get(route('box-history.show', $boxHistory));

        $response->assertOk();
        $response->assertViewIs('boxHistory.show');
        $response->assertViewHas('boxHistory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $boxHistory = BoxHistory::factory()->create();

        $response = $this->get(route('box-history.edit', $boxHistory));

        $response->assertOk();
        $response->assertViewIs('boxHistory.edit');
        $response->assertViewHas('boxHistory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BoxHistoryController::class,
            'update',
            \App\Http\Requests\BoxHistoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $boxHistory = BoxHistory::factory()->create();
        $box_id = $this->faker->randomNumber();
        $start_time = $this->faker->time();
        $end_time = $this->faker->time();

        $response = $this->put(route('box-history.update', $boxHistory), [
            'box_id' => $box_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        $boxHistory->refresh();

        $response->assertRedirect(route('boxHistory.index'));
        $response->assertSessionHas('boxHistory.id', $boxHistory->id);

        $this->assertEquals($box_id, $boxHistory->box_id);
        $this->assertEquals($start_time, $boxHistory->start_time);
        $this->assertEquals($end_time, $boxHistory->end_time);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $boxHistory = BoxHistory::factory()->create();

        $response = $this->delete(route('box-history.destroy', $boxHistory));

        $response->assertRedirect(route('boxHistory.index'));

        $this->assertSoftDeleted($boxHistory);
    }
}
