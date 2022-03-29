<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\EmployeeType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EmployeeTypeController
 */
class EmployeeTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $employeeTypes = EmployeeType::factory()->count(3)->create();

        $response = $this->get(route('employee-type.index'));

        $response->assertOk();
        $response->assertViewIs('employeeType.index');
        $response->assertViewHas('employeeTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('employee-type.create'));

        $response->assertOk();
        $response->assertViewIs('employeeType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmployeeTypeController::class,
            'store',
            \App\Http\Requests\EmployeeTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $type = $this->faker->word;
        $description = $this->faker->text;
        $work_area_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->post(route('employee-type.store'), [
            'type' => $type,
            'description' => $description,
            'work_area_id' => $work_area_id,
            'status' => $status,
        ]);

        $employeeTypes = EmployeeType::query()
            ->where('type', $type)
            ->where('description', $description)
            ->where('work_area_id', $work_area_id)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $employeeTypes);
        $employeeType = $employeeTypes->first();

        $response->assertRedirect(route('employeeType.index'));
        $response->assertSessionHas('employeeType.id', $employeeType->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $employeeType = EmployeeType::factory()->create();

        $response = $this->get(route('employee-type.show', $employeeType));

        $response->assertOk();
        $response->assertViewIs('employeeType.show');
        $response->assertViewHas('employeeType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $employeeType = EmployeeType::factory()->create();

        $response = $this->get(route('employee-type.edit', $employeeType));

        $response->assertOk();
        $response->assertViewIs('employeeType.edit');
        $response->assertViewHas('employeeType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmployeeTypeController::class,
            'update',
            \App\Http\Requests\EmployeeTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $employeeType = EmployeeType::factory()->create();
        $type = $this->faker->word;
        $description = $this->faker->text;
        $work_area_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->put(route('employee-type.update', $employeeType), [
            'type' => $type,
            'description' => $description,
            'work_area_id' => $work_area_id,
            'status' => $status,
        ]);

        $employeeType->refresh();

        $response->assertRedirect(route('employeeType.index'));
        $response->assertSessionHas('employeeType.id', $employeeType->id);

        $this->assertEquals($type, $employeeType->type);
        $this->assertEquals($description, $employeeType->description);
        $this->assertEquals($work_area_id, $employeeType->work_area_id);
        $this->assertEquals($status, $employeeType->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $employeeType = EmployeeType::factory()->create();

        $response = $this->delete(route('employee-type.destroy', $employeeType));

        $response->assertRedirect(route('employeeType.index'));

        $this->assertSoftDeleted($employeeType);
    }
}
