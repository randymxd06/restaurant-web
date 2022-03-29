<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token' => ['required', 'string', 'unique:invoices,token'],
            'rnc' => ['required', 'string', 'unique:invoices,rnc'],
            'order_id' => ['required', 'integer', 'gt:0'],
            'payment_method_id' => ['required', 'integer', 'gt:0'],
            'shipping' => ['required', 'numeric'],
            'promo' => ['required', 'numeric'],
            'taxes' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'status' => ['required'],
        ];
    }
}
