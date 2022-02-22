<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\CivilStatu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Civil_StatuController
 */
class Civil_StatuControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $civilStatus = Civil_Statu::factory()->count(3)->create();

        $response = $this->get(route('civil_-statu.index'));

        $response->assertOk();
        $response->assertViewIs('civilStatu.index');
        $response->assertViewHas('civilStatus');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('civil_-statu.create'));

        $response->assertOk();
        $response->assertViewIs('civilStatu.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Civil_StatuController::class,
            'store',
            \App\Http\Requests\Civil_StatuStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('civil_-statu.store'));

        $response->assertRedirect(route('civilStatu.index'));
        $response->assertSessionHas('civilStatu.id', $civilStatu->id);

        $this->assertDatabaseHas(civilStatus, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $civilStatu = Civil_Statu::factory()->create();

        $response = $this->get(route('civil_-statu.show', $civilStatu));

        $response->assertOk();
        $response->assertViewIs('civilStatu.show');
        $response->assertViewHas('civilStatu');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $civilStatu = Civil_Statu::factory()->create();

        $response = $this->get(route('civil_-statu.edit', $civilStatu));

        $response->assertOk();
        $response->assertViewIs('civilStatu.edit');
        $response->assertViewHas('civilStatu');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Civil_StatuController::class,
            'update',
            \App\Http\Requests\Civil_StatuUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $civilStatu = Civil_Statu::factory()->create();

        $response = $this->put(route('civil_-statu.update', $civilStatu));

        $civilStatu->refresh();

        $response->assertRedirect(route('civilStatu.index'));
        $response->assertSessionHas('civilStatu.id', $civilStatu->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $civilStatu = Civil_Statu::factory()->create();
        $civilStatu = CivilStatu::factory()->create();

        $response = $this->delete(route('civil_-statu.destroy', $civilStatu));

        $response->assertRedirect(route('civilStatu.index'));

        $this->assertDeleted($civilStatu);
    }
}
