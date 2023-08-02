<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'codigo' => $this->codigo,
            'tipoConta' => $this->tipo_conta,
            'saldoInicial' => $this->saldo_inicial/100
        ];
    }
}
