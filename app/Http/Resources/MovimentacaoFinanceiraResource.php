<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovimentacaoFinanceiraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'grid' => $this->grid,
            'data' => $this->data,
            'motivo' => $this->motivo,
            'contaDebitar' => $this->conta_debitar,
            'contaCreditar' => $this->conta_creditar,
            'obs' => $this->obs,
            'valor' => $this->valor,
            'parent' => $this->parent,
            'child' => $this->child,
            'documento' => $this->documento,
        ];
    }
}
