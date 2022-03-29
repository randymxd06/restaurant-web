<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTypeUpdateRequest extends FormRequest
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
            'description' => ['required', 'string'],
            'employee_type_id' => ['required', 'integer', 'gt:0'],
            'status' => ['required'],
        ];
    }
}
