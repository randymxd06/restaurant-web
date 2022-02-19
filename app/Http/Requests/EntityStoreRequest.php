<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntityStoreRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'identification' => ['required', 'string'],
            'sex_id' => ['required', 'integer', 'gt:0'],
            'civil_status_id' => ['required', 'integer', 'gt:0'],
            'nationality_id' => ['required', 'integer', 'gt:0'],
            'status' => ['required'],
        ];
    }
}
