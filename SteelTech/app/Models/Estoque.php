<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'Estoque';

    protected $fillable = [
        'nome',
        'tipoMateria',
        'dataFabricacao',
        'quantidade',
        'preco'
    ];
}