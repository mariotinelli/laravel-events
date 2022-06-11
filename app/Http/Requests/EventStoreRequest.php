<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'image' => ['required', 'image', 'max:10240'],
            'title' => ['required', 'max:191', 'string'],
            'date' => ['required'],
            'capacity' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'participants' => ['nullable', 'integer'],
            'id_user' => [
                'nullable',
                'exists:users,id_user',
            ],
            'id_event_category' => [
                'required',
                'exists:event_category,id_event_category',
            ],
            'id_event_address' => [
                'nullable',
                'exists:event_address,id_event_address',
            ],
        ];
    }
}
