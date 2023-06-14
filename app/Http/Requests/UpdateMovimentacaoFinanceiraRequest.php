<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovimentacaoFinanceiraRequest extends FormRequest
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
                'motivo' => ['required'],
                'conta_debitar' => ['required'],
                'conta_creditar' => ['required'],
                'valor' => ['required'],
                'data' => ['required', 'date'],
                'obs' => ['required', 'max:255'],
                'documento' => ['required'],
            ];
        } else
        {
            return[
                'motivo' => ['sometimes', 'required'],
                'conta_debitar' => ['sometimes', 'required'],
                'conta_creditar' => ['sometimes', 'required'],
                'valor' => ['sometimes', 'required'],
                'data' => ['sometimes', 'required', 'date'],
                'obs' => ['sometimes', 'required', 'size:255'],
                'documento' => ['sometimes', 'required'],
            ];
        };
    }

    public function ValidationData()
    {  
        $this->formatData();

        return $this->all();
    }

    private function formatData()
    {
        if ($this->input('contaDebitar')){
        $conta_debitar = $this->input('contaDebitar');
        $this->merge(['conta_debitar' => $conta_debitar]);}
        if ($this->input('contaCreditar')){
        $conta_creditar = $this->input('contaCreditar');
        $this->merge(['conta_creditar' => $conta_creditar]);}
    }
}

