<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'image' => ['sometimes', 'image', 'max:10240'],
            'title' => ['sometimes', 'max:191', 'string'],
            'date' => ['sometimes'],
            'capacity' => ['sometimes', 'integer'],
            'description' => ['sometimes', 'string'],
            'participants' => ['sometimes', 'integer'],
            'id_user' => [
                'sometimes',
                'exists:users,id_user',
            ],
            'id_event_category' => [
                'sometimes',
                'exists:event_category,id_event_category',
            ],
            'id_event_address' => [
                'sometimes',
                'exists:event_address,id_event_address',
            ],
        ];
    }
}
