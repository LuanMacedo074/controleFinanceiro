<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContasRequest extends FormRequest
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
        if ($this->method() == 'PUT')
        {
            return [
            "nome" => ['required'],
            "codigo" => ['required'],
            "tipo_conta" => ['required'],
        ];
        } else
        {
            return[
            "nome" => ['sometimes', 'required'],
            "codigo" => ['sometimes', 'required'],
            "tipo_conta" => ['sometimes', 'required'],
            ];
        };
    }
}
