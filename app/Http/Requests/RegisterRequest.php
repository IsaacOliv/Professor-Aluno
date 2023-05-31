<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                'required'
        ],
            'password' => [
                'required',
                'min:3'

        ],
            'email' => [
                'required',
            ]
        ];
    }
    public function messages(): array
{
    return [
        'name.required' => 'Campo "nome" de preenchimento obrigatorio',
        'password.required' => 'Campo "senha" de preenchimento obrigatorio',
        'email.required' =>'Campo "email" de preenchimento obrigatorio',
        'email.unique' => 'Email ja cadastrado',
        'password.min' => 'A senha deve ter no minimo 6 digitos'
    ];
}
}
