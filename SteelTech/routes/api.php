<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstoqueApiController;

Route::get('/user', function (Request $request) {

    return $request->user();

})->middleware('auth:sanctum');


Route::get(
    'estoque',
    [EstoqueApiController::class, 'listarApi']
);


Route::post(
    'estoque/add',
    [EstoqueApiController::class, 'addApi']
);


Route::put(
    'estoque/atualizar/{id}',
    [EstoqueApiController::class, 'updateApi']
);


Route::delete(
    'estoque/deletar/{id}',
    [EstoqueApiController::class, 'deletarApi']
);