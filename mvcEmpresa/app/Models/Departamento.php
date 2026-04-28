<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{

    protected $fillable = [
        'nome',
        'dataCriacao',
        'orcamento',
        'sigla'
    ];

    public function funcionarios(){
        return $this->hasMany(Funcionario::class);
    }
}