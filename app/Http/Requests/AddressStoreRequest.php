<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'entity_id' => ['required', 'integer', 'exists:entities,id'],
            'sector_id' => ['required', 'integer', 'exists:sectors,id'],
            'reference' => ['required', 'string'],
            'status' => ['required'],
        ];
    }
}
