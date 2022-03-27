<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientsStockUpdateRequest extends FormRequest
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
            'ingredient_id' => ['required', 'integer', 'gt:0'],
            'quantity' => ['required', 'string'],
            'unit_measurement_id' => ['required', 'integer', 'gt:0'],
            'arrival_date' => ['required', 'date'],
            'expiration_date' => ['required', 'date'],
        ];
    }
}
