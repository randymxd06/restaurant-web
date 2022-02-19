<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Sex;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SexController
 */
class SexControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $sexes = Sex::factory()->count(3)->create();

        $response = $this->get(route('sex.index'));

        $response->assertOk();
        $response->assertViewIs('sex.index');
        $response->assertViewHas('sexes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('sex.create'));

        $response->assertOk();
        $response->assertViewIs('sex.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SexController::class,
            'store',
            \App\Http\Requests\SexStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $symbol = $this->faker->word;
        $description = $this->faker->text;

        $response = $this->post(route('sex.store'), [
            'name' => $name,
            'symbol' => $symbol,
            'description' => $description,
        ]);

        $sexes = Sex::query()
            ->where('name', $name)
            ->where('symbol', $symbol)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $sexes);
        $sex = $sexes->first();

        $response->assertRedirect(route('sex.index'));
        $response->assertSessionHas('sex.id', $sex->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $sex = Sex::factory()->create();

        $response = $this->get(route('sex.show', $sex));

        $response->assertOk();
        $response->assertViewIs('sex.show');
        $response->assertViewHas('sex');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $sex = Sex::factory()->create();

        $response = $this->get(route('sex.edit', $sex));

        $response->assertOk();
        $response->assertViewIs('sex.edit');
        $response->assertViewHas('sex');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SexController::class,
            'update',
            \App\Http\Requests\SexUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $sex = Sex::factory()->create();
        $name = $this->faker->name;
        $symbol = $this->faker->word;
        $description = $this->faker->text;

        $response = $this->put(route('sex.update', $sex), [
            'name' => $name,
            'symbol' => $symbol,
            'description' => $description,
        ]);

        $sex->refresh();

        $response->assertRedirect(route('sex.index'));
        $response->assertSessionHas('sex.id', $sex->id);

        $this->assertEquals($name, $sex->name);
        $this->assertEquals($symbol, $sex->symbol);
        $this->assertEquals($description, $sex->description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $sex = Sex::factory()->create();

        $response = $this->delete(route('sex.destroy', $sex));

        $response->assertRedirect(route('sex.index'));

        $this->assertSoftDeleted($sex);
    }
}
