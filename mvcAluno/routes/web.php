<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
});

// =====================
// ROTAS ALUNO
// =====================

// LISTAR
Route::get('/aluno/listar', [AlunoController::class, 'listar'])
    ->name('aluno.listar');

// FORM CADASTRO (AGORA CORRETO)
Route::get('/aluno/cadastrar', [AlunoController::class, 'create'])
    ->name('aluno.cadastro');

// SALVAR
Route::post('/aluno/salvar', [AlunoController::class, 'add'])
    ->name('aluno.salvar');

// EDITAR
Route::get('/aluno/{id}/atualizar', [AlunoController::class, 'atualizar'])
    ->name('aluno.editar');

// UPDATE
Route::put('/aluno/{id}/update', [AlunoController::class, 'update'])
    ->name('aluno.update');

// DELETE
Route::delete('/aluno/{id}', [AlunoController::class, 'deletar'])
    ->name('aluno.deletar');


// =====================
// ROTAS TURMA
// =====================

// FORM TURMA (pode continuar assim)
Route::get('/turma/cadastrar', function(){
    return view('cadastroTurma');
})->name('turma.cadastroTurma');

// SALVAR TURMA
Route::post('/turma/salvar', [TurmaController::class, 'add'])
    ->name('turma.salvar');