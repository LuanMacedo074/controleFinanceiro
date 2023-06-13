<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoFinanceira extends Model
{
    protected $table = 'movimentacao_financeira';
    protected $primaryKey = 'grid';
    public $timestamps = false;
    use HasFactory;
    
    protected $fillable = [
        'data',
        'motivo',
        'conta_creditar',
        'conta_debitar',
        'obs',
        'valor',
        'parent',
        'child',
        'documento',
    ];
    
    protected $hidden = [
        'grid',
    ];
}
