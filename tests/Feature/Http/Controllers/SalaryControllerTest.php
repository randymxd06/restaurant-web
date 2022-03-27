<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Salary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SalaryController
 */
class SalaryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $salaries = Salary::factory()->count(3)->create();

        $response = $this->get(route('salary.index'));

        $response->assertOk();
        $response->assertViewIs('salary.index');
        $response->assertViewHas('salaries');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('salary.create'));

        $response->assertOk();
        $response->assertViewIs('salary.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SalaryController::class,
            'store',
            \App\Http\Requests\SalaryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $salary = $this->faker->randomFloat(/** double_attributes **/);

        $response = $this->post(route('salary.store'), [
            'salary' => $salary,
        ]);

        $salaries = Salary::query()
            ->where('salary', $salary)
            ->get();
        $this->assertCount(1, $salaries);
        $salary = $salaries->first();

        $response->assertRedirect(route('salary.index'));
        $response->assertSessionHas('salary.id', $salary->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $salary = Salary::factory()->create();

        $response = $this->get(route('salary.show', $salary));

        $response->assertOk();
        $response->assertViewIs('salary.show');
        $response->assertViewHas('salary');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $salary = Salary::factory()->create();

        $response = $this->get(route('salary.edit', $salary));

        $response->assertOk();
        $response->assertViewIs('salary.edit');
        $response->assertViewHas('salary');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SalaryController::class,
            'update',
            \App\Http\Requests\SalaryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $salary = Salary::factory()->create();
        $salary = $this->faker->randomFloat(/** double_attributes **/);

        $response = $this->put(route('salary.update', $salary), [
            'salary' => $salary,
        ]);

        $salary->refresh();

        $response->assertRedirect(route('salary.index'));
        $response->assertSessionHas('salary.id', $salary->id);

        $this->assertEquals($salary, $salary->salary);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $salary = Salary::factory()->create();

        $response = $this->delete(route('salary.destroy', $salary));

        $response->assertRedirect(route('salary.index'));

        $this->assertSoftDeleted($salary);
    }
}
