<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MotivoMovto extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->codigo) {
                $seq = DB::select("select nextval('motivo_movto_codigo_seq'::regclass) as nv;")[0]->nv;
                $model->codigo = $seq;
            }
        });
    }

    protected $table = 'motivo_movto';
    protected $primaryKey = 'grid';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo'
    ];
    
    protected $hidden = [
        'grid'
    ];
}
