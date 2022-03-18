<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'img' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'products_categories_id' => ['required', 'int'],
            'description' => ['required', 'string'],
            'status' => ['boolean']
        ];
    }

}
