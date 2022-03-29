<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Email;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EmailController
 */
class EmailControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $emails = Email::factory()->count(3)->create();

        $response = $this->get(route('email.index'));

        $response->assertOk();
        $response->assertViewIs('email.index');
        $response->assertViewHas('emails');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('email.create'));

        $response->assertOk();
        $response->assertViewIs('email.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmailController::class,
            'store',
            \App\Http\Requests\EmailStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $email = $this->faker->safeEmail;

        $response = $this->post(route('email.store'), [
            'email' => $email,
        ]);

        $emails = Email::query()
            ->where('email', $email)
            ->get();
        $this->assertCount(1, $emails);
        $email = $emails->first();

        $response->assertRedirect(route('email.index'));
        $response->assertSessionHas('email.id', $email->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $email = Email::factory()->create();

        $response = $this->get(route('email.show', $email));

        $response->assertOk();
        $response->assertViewIs('email.show');
        $response->assertViewHas('email');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $email = Email::factory()->create();

        $response = $this->get(route('email.edit', $email));

        $response->assertOk();
        $response->assertViewIs('email.edit');
        $response->assertViewHas('email');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmailController::class,
            'update',
            \App\Http\Requests\EmailUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $email = Email::factory()->create();
        $email = $this->faker->safeEmail;

        $response = $this->put(route('email.update', $email), [
            'email' => $email,
        ]);

        $email->refresh();

        $response->assertRedirect(route('email.index'));
        $response->assertSessionHas('email.id', $email->id);

        $this->assertEquals($email, $email->email);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $email = Email::factory()->create();

        $response = $this->delete(route('email.destroy', $email));

        $response->assertRedirect(route('email.index'));

        $this->assertSoftDeleted($email);
    }
}
