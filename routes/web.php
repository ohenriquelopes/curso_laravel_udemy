<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
|    verbos HTTP
    GET: obter dados
    POST: enviar dados
    PUT: atualizar dados
    DELETE: deletar dados
    PATCH: atualizar dados
    OPTIONS: obter metodos suportados



*/
//
//Route::get('/', function () {
//    return 'ola, seja bem vindo ao curso';
//});

Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal']);

Route::get('/sobre', [\App\Http\Controllers\SobreController::class,'sobre']);

Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'contato']);
