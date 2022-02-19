<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'gt:0'],
            'box_id' => ['required', 'integer', 'gt:0'],
            'customer_id' => ['required', 'integer', 'gt:0'],
            'orders_types_id' => ['required', 'integer', 'gt:0'],
            'table_id' => ['required', 'integer', 'gt:0'],
            'total' => ['required', 'numeric'],
            'status' => ['required'],
        ];
    }
}
