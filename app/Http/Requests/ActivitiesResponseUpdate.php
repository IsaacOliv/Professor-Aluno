<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActivitiesResponseUpdate extends FormRequest
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
            'activity_id' => [
                'required',
                Rule::unique('activities_responses', 'activity_id')->ignore($this->activity_id, 'activity_id'),
            ],
            'student_id' => [
                'required',
                Rule::unique('activities_responses', 'student_id')->ignore($this->student_id, 'student_id'),
            ],
            'description' => [
                'required',
                'max:100000',
                Rule::unique('activities_responses', 'description')->ignore($this->description, 'description'),
            ],
            'check' => [
                'nullable',
            ],
            'filepath' => [
                'nullable',
                'image',
                'max:2048',
                Rule::unique('activities_responses', 'filepath')->ignore($this->filepath, 'filepath'),
            ],
            'note' => [
                'nullable',
            ],

        ];
        return $rules;
    }
}
