<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'Info';

    protected $fillable = [
        'endereco',
        'telefone',
        'idade',
        'data_nascimento',
        'aluno_id'
    ];

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }
}