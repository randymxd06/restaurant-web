<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\UserType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserTypeController
 */
class UserTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $userTypes = UserType::factory()->count(3)->create();

        $response = $this->get(route('user-type.index'));

        $response->assertOk();
        $response->assertViewIs('userType.index');
        $response->assertViewHas('userTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('user-type.create'));

        $response->assertOk();
        $response->assertViewIs('userType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserTypeController::class,
            'store',
            \App\Http\Requests\UserTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $description = $this->faker->text;
        $employee_type_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->post(route('user-type.store'), [
            'description' => $description,
            'employee_type_id' => $employee_type_id,
            'status' => $status,
        ]);

        $userTypes = UserType::query()
            ->where('description', $description)
            ->where('employee_type_id', $employee_type_id)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $userTypes);
        $userType = $userTypes->first();

        $response->assertRedirect(route('userType.index'));
        $response->assertSessionHas('userType.id', $userType->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $userType = UserType::factory()->create();

        $response = $this->get(route('user-type.show', $userType));

        $response->assertOk();
        $response->assertViewIs('userType.show');
        $response->assertViewHas('userType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $userType = UserType::factory()->create();

        $response = $this->get(route('user-type.edit', $userType));

        $response->assertOk();
        $response->assertViewIs('userType.edit');
        $response->assertViewHas('userType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserTypeController::class,
            'update',
            \App\Http\Requests\UserTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $userType = UserType::factory()->create();
        $description = $this->faker->text;
        $employee_type_id = $this->faker->randomNumber();
        $status = $this->faker->boolean;

        $response = $this->put(route('user-type.update', $userType), [
            'description' => $description,
            'employee_type_id' => $employee_type_id,
            'status' => $status,
        ]);

        $userType->refresh();

        $response->assertRedirect(route('userType.index'));
        $response->assertSessionHas('userType.id', $userType->id);

        $this->assertEquals($description, $userType->description);
        $this->assertEquals($employee_type_id, $userType->employee_type_id);
        $this->assertEquals($status, $userType->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $userType = UserType::factory()->create();

        $response = $this->delete(route('user-type.destroy', $userType));

        $response->assertRedirect(route('userType.index'));

        $this->assertSoftDeleted($userType);
    }
}
