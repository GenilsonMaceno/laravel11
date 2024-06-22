<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserTesteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255', // tipo de validação separado por pipe
            'email' => [ 
                'required',
                'email',
                'unique:users,email', // estou falando é que o email é único na tabela de usuários na coluna e-mail
                'min:6', // min de caracteres
                'max:20', // max de caracteres
            ], // validação por array
            'password' => [
                'required',
                'min:6',
                'max:20',
            ]
        ];
    }
}
