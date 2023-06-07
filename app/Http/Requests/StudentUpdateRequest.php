<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentUpdateRequest extends FormRequest
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

        $rules = [
            'name' => [
                'required',
                Rule::unique('students', 'name')->ignore($this->name, 'name'), 
            ],
            'email' => [
                'required',
                Rule::unique('students', 'email')->ignore($this->email, 'email'), 
            ],

        ];

        return $rules;
    }
}
