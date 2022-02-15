<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PostoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    echo "HOME API";
});

// Cidades
// listar todas as cidades 
Route::get('cidade', [CidadeController::class, 'listaCidades']); // feito
// listar a cidade em especifico
Route::get('cidade/{id}', [CidadeController::class, 'listaCidadesEspecifico']);  // feito
// cadastrando cidade
Route::post('cidade', [CidadeController::class, 'criaCidades']); // feito
// deletando uma cidade
Route::delete('cidade/{id}', [CidadeController::class, 'apagaCidades']); // feito
//editando uma cidade
Route::put('cidade/{id}', [CidadeController::class, 'editaCidades']);

// Postos
// listar todos os postos
Route::get('posto', [PostoController::class, 'listaPostos']); // feito
// listar um posto em especifico
Route::get('posto/{id}', [PostoController::class, 'listaPostosEspecifico']);  // feito
// cadastrando um posto
Route::post('posto', [PostoController::class, 'criaPostos']);  // feito
// deletando uma cidade
Route::delete('posto/{id}', [PostoController::class, 'apagaPostos']); // feito
//editando uma cidade
Route::put('posto/{id}', [PostoController::class, 'editaPostos']); //feito