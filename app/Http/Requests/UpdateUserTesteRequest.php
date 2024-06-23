<?php

namespace App\Http\Requests;

class UpdateUserTesteRequest extends StoreUserTesteRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();

        $rules['password'] = [
            'nullable',
            'min:6',
            'max:20',
        ];

        return $rules;
    }
}
