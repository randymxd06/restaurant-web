<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableStoreRequest extends FormRequest
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
            'people_capacity' => ['required', 'integer', 'gt:0'],
            'living_room_id' => ['required', 'integer', 'gt:0'],
            'description' => ['required', 'string'],
            'status' => ['required'],
        ];
    }
}
