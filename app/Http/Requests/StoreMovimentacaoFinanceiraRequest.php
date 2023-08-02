<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovimentacaoFinanceiraRequest extends FormRequest
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
            'motivo' => ['required'],
            'conta_debitar' => ['required'],
            'conta_creditar' => ['required'],
            'valor' => ['required'],
        ];
    }

    public function ValidationData()
    {
        $this->formatData();
        $this->convertValor();
        return $this->all();
    }

    private function formatData()
    {
        $conta_debitar = $this->input('contaDebitar');
        $conta_creditar = $this->input('contaCreditar');

        $this->merge(['conta_creditar' => $conta_creditar, 'conta_debitar' => $conta_debitar]);
    }

    private function convertValor()
    {
        $this->merge(['valor' => $this->input('valor')*100]);
    }
}

