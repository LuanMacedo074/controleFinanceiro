<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreContasRequest extends FormRequest
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
            "nome" => ['required'],
            "codigo" => ['required'],
            "tipo_conta" => ['required'],
        ];
    }

    /**
     * Get the validation data that should be used for the request.
     *
     * @return array
     */
    public function validationData()
    {
        $this->convertTipoConta();

        return $this->all();
    }

    /**
     * Convert the "tipoConta" attribute to "tipo_conta".
     */
    private function convertTipoConta()
    {
        $tipoConta = $this->input('tipoConta');

        $this->merge(['tipo_conta' => $tipoConta]);
    }
}