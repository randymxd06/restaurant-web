<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationUpdateRequest extends FormRequest
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
            'customers_id' => ['required', 'integer', 'gt:0'],
            'type_reservations_id' => ['required', 'integer', 'gt:0'],
            'living_room_id' => ['required', 'integer', 'gt:0'],
            'date_time' => ['required'],
            'number_people' => ['required', 'string'],
            'description' => ['required', 'string'],
            'status' => ['required'],
        ];
    }
}
