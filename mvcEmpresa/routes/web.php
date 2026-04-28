<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\DepartamentoController;

Route::get('/', function () {
    return view('welcome');
});

// Funcionarios
Route::get('/funcionario/listar',[FuncionarioController::class, 'listar'])->name('funcionario.listar');

Route::get('/funcionario/cadastrar',[FuncionarioController::class, 'create'])->name('funcionario.cadastro');

Route::post('/funcionario/salvar',[FuncionarioController::class, 'add'])->name('funcionario.salvar');

Route::get('/aluno/{id}/atualizar', [AlunoController::class, 'atualizar'])->name('aluno.atualizar');

Route::put('/aluno/{id}/update', [AlunoController::class, 'update'])->name('aluno.update');

// Departamento
Route::get('/departamento/cadastrar', function(){
    return view('cadastroDepartamento');
})->name('departamento.cadastro');

Route::post('/departamento/salvar',[DepartamentoController::class, 'add'])->name('departamento.salvar');