<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstoqueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/estoque/listar',[EstoqueController::class, 'listar'])->
name('estoque.listar');

Route::get('/estoque/cadastrar', function(){ 
    return view('cadastroEstoque');
})->name('estoque.cadastro');

Route::post('/estoque/salvar',[EstoqueController::class, 'add'])
->name('estoque.salvar');
