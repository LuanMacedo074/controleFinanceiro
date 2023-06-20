<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contas extends Model
{
    protected $table = 'contas';
    protected $primaryKey = 'grid';
    public $timestamps = false;
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'codigo',
        'tipo_conta',
        'saldo_inicial'
    ];
    
    protected $hidden = [
        'grid',
    ];
}
