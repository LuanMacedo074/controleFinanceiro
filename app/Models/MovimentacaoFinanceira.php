<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MovimentacaoFinanceira extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->documento) {
                $seq = DB::select("select nextval('movimentacao_financeira_documento_seq'::regclass) as nv;")[0]->nv;
                $model->documento = $seq;
            }
        });
    }

    
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
        'child',
        'parent'
    ];
}
