<?php

return[

    'custom' => [
        'nome' => [
            'required' => 'O nome é obrigatório',
            'max' => 'O nome deve ter no máximo :max caracteres.'
        ],
        'num_setor' => [
            'required' => 'O numero do setor é obrigatório',
            'numeric' => 'O numero do setor deve ser numérico',
            'max' => 'O numero do setor nao pode ser maior que :max.'            
        ],
        'quantidade' => [
            'required' => 'O campo quantidade é obrigatório',
            'numeric' => 'A quantidade deve ser numérico',
            'max' => 'A quantidade não pode ser maior que :max.'   
        ],
        'valor' => [
            'required' => 'O campo valor é obrigatório',
            'numeric' => 'O valor deve ser numérico',  
        ],
    ],
];