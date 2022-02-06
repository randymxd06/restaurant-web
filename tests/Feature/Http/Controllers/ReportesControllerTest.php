<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ReportesController
 */
class ReportesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $reportes = Reportes::factory()->count(3)->create();

        $response = $this->get(route('reporte.index'));

        $response->assertOk();
        $response->assertViewIs('reporte.index');
        $response->assertViewHas('reportes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('reporte.create'));

        $response->assertOk();
        $response->assertViewIs('reporte.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReportesController::class,
            'store',
            \App\Http\Requests\ReportesStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('reporte.store'));

        $response->assertRedirect(route('reporte.index'));
        $response->assertSessionHas('reporte.id', $reporte->id);

        $this->assertDatabaseHas(reportes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $reporte = Reportes::factory()->create();

        $response = $this->get(route('reporte.show', $reporte));

        $response->assertOk();
        $response->assertViewIs('reporte.show');
        $response->assertViewHas('reporte');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $reporte = Reportes::factory()->create();

        $response = $this->get(route('reporte.edit', $reporte));

        $response->assertOk();
        $response->assertViewIs('reporte.edit');
        $response->assertViewHas('reporte');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReportesController::class,
            'update',
            \App\Http\Requests\ReportesUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $reporte = Reportes::factory()->create();

        $response = $this->put(route('reporte.update', $reporte));

        $reporte->refresh();

        $response->assertRedirect(route('reporte.index'));
        $response->assertSessionHas('reporte.id', $reporte->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $reporte = Reportes::factory()->create();
        $reporte = Reporte::factory()->create();

        $response = $this->delete(route('reporte.destroy', $reporte));

        $response->assertRedirect(route('reporte.index'));

        $this->assertDeleted($reporte);
    }
}
