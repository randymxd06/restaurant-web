<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InvoiceController
 */
class InvoiceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $invoices = Invoice::factory()->count(3)->create();

        $response = $this->get(route('invoice.index'));

        $response->assertOk();
        $response->assertViewIs('invoice.index');
        $response->assertViewHas('invoices');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('invoice.create'));

        $response->assertOk();
        $response->assertViewIs('invoice.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InvoiceController::class,
            'store',
            \App\Http\Requests\InvoiceStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $token = $this->faker->word;
        $rnc = $this->faker->word;
        $order_id = $this->faker->randomNumber();
        $payment_method_id = $this->faker->randomNumber();
        $shipping = $this->faker->randomFloat(/** double_attributes **/);
        $promo = $this->faker->randomFloat(/** double_attributes **/);
        $taxes = $this->faker->randomFloat(/** double_attributes **/);
        $discount = $this->faker->randomFloat(/** double_attributes **/);
        $total = $this->faker->randomFloat(/** double_attributes **/);
        $status = $this->faker->boolean;

        $response = $this->post(route('invoice.store'), [
            'token' => $token,
            'rnc' => $rnc,
            'order_id' => $order_id,
            'payment_method_id' => $payment_method_id,
            'shipping' => $shipping,
            'promo' => $promo,
            'taxes' => $taxes,
            'discount' => $discount,
            'total' => $total,
            'status' => $status,
        ]);

        $invoices = Invoice::query()
            ->where('token', $token)
            ->where('rnc', $rnc)
            ->where('order_id', $order_id)
            ->where('payment_method_id', $payment_method_id)
            ->where('shipping', $shipping)
            ->where('promo', $promo)
            ->where('taxes', $taxes)
            ->where('discount', $discount)
            ->where('total', $total)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $invoices);
        $invoice = $invoices->first();

        $response->assertRedirect(route('invoice.index'));
        $response->assertSessionHas('invoice.id', $invoice->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->get(route('invoice.show', $invoice));

        $response->assertOk();
        $response->assertViewIs('invoice.show');
        $response->assertViewHas('invoice');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->get(route('invoice.edit', $invoice));

        $response->assertOk();
        $response->assertViewIs('invoice.edit');
        $response->assertViewHas('invoice');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InvoiceController::class,
            'update',
            \App\Http\Requests\InvoiceUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $invoice = Invoice::factory()->create();
        $token = $this->faker->word;
        $rnc = $this->faker->word;
        $order_id = $this->faker->randomNumber();
        $payment_method_id = $this->faker->randomNumber();
        $shipping = $this->faker->randomFloat(/** double_attributes **/);
        $promo = $this->faker->randomFloat(/** double_attributes **/);
        $taxes = $this->faker->randomFloat(/** double_attributes **/);
        $discount = $this->faker->randomFloat(/** double_attributes **/);
        $total = $this->faker->randomFloat(/** double_attributes **/);
        $status = $this->faker->boolean;

        $response = $this->put(route('invoice.update', $invoice), [
            'token' => $token,
            'rnc' => $rnc,
            'order_id' => $order_id,
            'payment_method_id' => $payment_method_id,
            'shipping' => $shipping,
            'promo' => $promo,
            'taxes' => $taxes,
            'discount' => $discount,
            'total' => $total,
            'status' => $status,
        ]);

        $invoice->refresh();

        $response->assertRedirect(route('invoice.index'));
        $response->assertSessionHas('invoice.id', $invoice->id);

        $this->assertEquals($token, $invoice->token);
        $this->assertEquals($rnc, $invoice->rnc);
        $this->assertEquals($order_id, $invoice->order_id);
        $this->assertEquals($payment_method_id, $invoice->payment_method_id);
        $this->assertEquals($shipping, $invoice->shipping);
        $this->assertEquals($promo, $invoice->promo);
        $this->assertEquals($taxes, $invoice->taxes);
        $this->assertEquals($discount, $invoice->discount);
        $this->assertEquals($total, $invoice->total);
        $this->assertEquals($status, $invoice->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->delete(route('invoice.destroy', $invoice));

        $response->assertRedirect(route('invoice.index'));

        $this->assertSoftDeleted($invoice);
    }
}
