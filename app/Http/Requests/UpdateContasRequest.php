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
            "saldo_inicial" => ['required']
        ];
        } else
        {
            return[
            "nome" => ['sometimes', 'required'],
            "codigo" => ['sometimes', 'required'],
            "tipo_conta" => ['sometimes', 'required'],
            "saldo_inicial" => ['required', 'sometimes']
            ];
        };
    }

    public function validationData()
    {
        $this->convertTipoConta();
        $this->convertSaldoInicial();

        return $this->all();
    }

    /**
     * Convert the "tipoConta" attribute to "tipo_conta".
     */
    private function convertTipoConta()
    {  
        if ($this->input('tipoConta')){
        $tipoConta = $this->input('tipoConta');

        $this->merge(['tipo_conta' => $tipoConta]);}
    }

    private function convertSaldoInicial()
    {
        if ($this->input('saldoInicial'))
        {
        $saldo_inicial = $this->input('saldoInicial');
        $this->merge(['saldo_inicial' => $saldo_inicial]);
        }    
    }
}
