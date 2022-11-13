<?php

use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\Route;

Route::get('usuarios', [usuariosController::class, 'index']);
Route::get('usuarios/novo', [usuariosController::class, 'create']);
Route::get('usuarios/editar/{id}', [usuariosController::class, 'edit']);
Route::get('usuarios/excluir/{id}', [usuariosController::class, 'destroy']);
Route::get('usuarios/{id}', [usuariosController::class, 'show']);
Route::post('usuarios/gravar/{id}', [usuariosController::class, 'update']);
Route::post('usuarios/salvar', [usuariosController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});
