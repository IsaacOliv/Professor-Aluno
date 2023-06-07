<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {



        
        $rules = [
            'activity_id' => [
                'required',
            ],
            'student_id' => [
                'required',
            ],
            'description' => [
                'required',
                'max:100000',
            ],
            'check' => [
                'required',
            ],
            'filepath' => [
                'nullable',
                'image',
                'max:2048',
            ],
            'note' => [
                'nullable',
            ],

        ];

        if ($this->method() === 'PUT') {
            $rules['activity_id'] =  [
                'required',
                Rule::unique('activities_responses', 'activity_id')->ignore($this->activity_id, 'activity_id'), 
            ];
            $rules['student_id'] =  [
                'required',
                Rule::unique('activities_responses', 'student_id')->ignore($this->student_id, 'student_id'), 
            ];
            $rules['description'] =  [
                'required',
                'max:100000',
                Rule::unique('activities_responses', 'description')->ignore($this->description, 'description'), 
            ];
            $rules['check'] =  [
                'required',
                Rule::unique('activities_responses', 'check')->ignore($this->check, 'check'), 
            ];
            $rules['filepath'] =  [
                'nullable',
                'image',
                'max:2048',
            ];
            $rules['note'] =  [
                'nullable',
            ];
        }
        return $rules;
    }
    public function messages(): array
    {
        return [
            'activity_id.required' => '2 da disciplina obrigatorio',
            'student_id.required' => '3 da disciplina obrigatorio',
            'description.required' => '1 da disciplina obrigatorio',
            'check.required' => '4 da disciplina obrigatorio',
            'filepath.required' => '5 da disciplina obrigatorio',
            'note.required' => '6 da disciplina obrigatorio',
        ];
    }
}
