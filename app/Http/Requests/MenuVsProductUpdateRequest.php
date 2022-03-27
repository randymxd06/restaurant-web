<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuVsProductUpdateRequest extends FormRequest
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
            'menu_id' => ['required', 'integer', 'gt:0'],
            'product_id' => ['required', 'integer', 'gt:0'],
            'status' => ['required'],
        ];
    }
}
