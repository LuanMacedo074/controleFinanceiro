<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class MovimentacaoFinanceiraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($request->input('names')) {
            $motivo = DB::select("SELECT nome FROM motivo_movto WHERE codigo='$this->motivo'");
            $contaDebitar = DB::select("SELECT nome FROM contas WHERE codigo='$this->conta_debitar'");
            $contaCreditar = DB::select("SELECT nome FROM contas WHERE codigo='$this->conta_creditar'");

            return [
                'documento' => $this->documento,
                'data' => $this->data,
                'motivo' => $motivo[0]->nome,
                'contaDebitar' => $contaDebitar[0]->nome,
                'contaCreditar' => $contaCreditar[0]->nome,
                'obs' => $this->obs,
                'valor' => $this->valor/100,
            ];
        }

        return [
            'documento' => $this->documento,
            'data' => $this->data,
            'motivo' => $this->motivo,
            'contaDebitar' => $this->conta_debitar,
            'contaCreditar' => $this->conta_creditar,
            'obs' => $this->obs,
            'valor' => $this->valor/100,
        ];
    }
}
