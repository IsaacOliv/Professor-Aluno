<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivitiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:5',
                'max:50',
            ],
            'description' => [
                'required',
                'max:255',
            ],
            'teatcher_id' => [
                'required',
            ],
            'filepath' => [
                'nullable',
                'image',
                'max:2048',
            ],
            'discipline_id' => [
                'required',
            ],
        ];
    }
}
