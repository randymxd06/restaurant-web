<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CompanyController
 */
class CompanyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $companies = Company::factory()->count(3)->create();

        $response = $this->get(route('company.index'));

        $response->assertOk();
        $response->assertViewIs('company.index');
        $response->assertViewHas('companies');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('company.create'));

        $response->assertOk();
        $response->assertViewIs('company.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CompanyController::class,
            'store',
            \App\Http\Requests\CompanyStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $phone = $this->faker->phoneNumber;
        $email = $this->faker->safeEmail;
        $status = $this->faker->boolean;

        $response = $this->post(route('company.store'), [
            'name' => $name,
            'description' => $description,
            'phone' => $phone,
            'email' => $email,
            'status' => $status,
        ]);

        $companies = Company::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('phone', $phone)
            ->where('email', $email)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $companies);
        $company = $companies->first();

        $response->assertRedirect(route('company.index'));
        $response->assertSessionHas('company.id', $company->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $company = Company::factory()->create();

        $response = $this->get(route('company.show', $company));

        $response->assertOk();
        $response->assertViewIs('company.show');
        $response->assertViewHas('company');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $company = Company::factory()->create();

        $response = $this->get(route('company.edit', $company));

        $response->assertOk();
        $response->assertViewIs('company.edit');
        $response->assertViewHas('company');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CompanyController::class,
            'update',
            \App\Http\Requests\CompanyUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $company = Company::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $phone = $this->faker->phoneNumber;
        $email = $this->faker->safeEmail;
        $status = $this->faker->boolean;

        $response = $this->put(route('company.update', $company), [
            'name' => $name,
            'description' => $description,
            'phone' => $phone,
            'email' => $email,
            'status' => $status,
        ]);

        $company->refresh();

        $response->assertRedirect(route('company.index'));
        $response->assertSessionHas('company.id', $company->id);

        $this->assertEquals($name, $company->name);
        $this->assertEquals($description, $company->description);
        $this->assertEquals($phone, $company->phone);
        $this->assertEquals($email, $company->email);
        $this->assertEquals($status, $company->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $company = Company::factory()->create();

        $response = $this->delete(route('company.destroy', $company));

        $response->assertRedirect(route('company.index'));

        $this->assertSoftDeleted($company);
    }
}
