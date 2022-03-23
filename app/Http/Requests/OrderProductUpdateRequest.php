<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderProductUpdateRequest extends FormRequest
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
            'order_id' => ['required', 'integer', 'gt:0'],
            'box_id' => ['required', 'integer', 'gt:0'],
            'customer_id' => ['required', 'integer', 'gt:0'],
            'order_types_id' => ['required', 'integer', 'gt:0'],
            'table_id' => ['required', 'integer', 'gt:0'],
            'total' => ['required', 'numeric'],
            'status' => ['required'],
        ];
    }
}
