<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipesVsIngredientUpdateRequest extends FormRequest
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
            'ingredients_id' => ['required', 'integer', 'gt:0'],
            'quantity' => ['required', 'integer', 'gt:0'],
            'unit_measurement_id' => ['required', 'integer', 'gt:0'],
            'description' => ['required', 'string'],
        ];
    }
}
