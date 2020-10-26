<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'max:200'],
            'address' => ['required', 'max:200'],
            'phone_number' => ['required', 'max:200'],
            'personal_identity' => ['required', 'max:200'],
            'peoples_count' => ['required', 'integer', 'max:50'],
            'schedule_id' => ['required', 'integer', 'exists:schedules,id'],
        ];
    }
}