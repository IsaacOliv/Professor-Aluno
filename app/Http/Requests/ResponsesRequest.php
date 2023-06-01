<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponsesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'students_id' => [
                'required',
            ],
            'activity_id' => [
                'required'
            ],
            'filepath' => [
                'nullable',
                'image',
                'max:2048',
            ],
            'enum' => [
                'nullable'
            ],
            'note' => [
                'nullable'
            ],
        ];
    }
}
