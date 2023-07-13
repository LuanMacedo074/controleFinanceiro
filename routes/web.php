<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContasController;
use App\Http\Controllers\MovimentacaoFinanceiraController;
use App\Http\Controllers\MotivoMovtoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return ['apiName' => 'api_luan', 'apiVersion' => '1.0'];
});


Route::group(['namespace' => 'App\Http\Controllers'], function (){
    route::options('*', function (){
        return [];
    });
    
    //Endpoint contas
    route::get('contas' , [ContasController::class, 'index']);
    route::post('contas', [ContasController::class, 'store']);
    route::put('contas', [ContasController::class, 'store']);
    route::get('contas/placeholders', [ContasController::class, 'contasPlaceholder']);
    route::delete('contas/{codigo}', [ContasController::class, 'delete']);
    route::put('contas/{codigo}', [ContasController::class, 'update']);
    route::patch('contas/{codigo}', [ContasController::class, 'update']);



    //Endpoint pra movimentações financeiras
    route::get('movto' , [MovimentacaoFinanceiraController::class, 'index']);
    route::post('movto', [MovimentacaoFinanceiraController::class, 'store']);
    route::put('movto', [MovimentacaoFinanceiraController::class, 'store']);
    route::delete('movto/{documento}', [MovimentacaoFinanceiraController::class, 'delete']);
    route::put('movto/{documento}', [MovimentacaoFinanceiraController::class, 'update']);
    route::patch('movto/{documento}', [MovimentacaoFinanceiraController::class, 'update']);
    route::get('movto/getnext', [MovimentacaoFinanceiraController::class, 'getNext']);

    //Endpoint para os motivos de movimentações
    route::get('motivo_movto' , [MotivoMovtoController::class, 'index']);
    route::post('motivo_movto', [MotivoMovtoController::class, 'store']);
    route::put('motivo_movto', [MotivoMovtoController::class, 'store']);
    route::delete('motivo_movto/{codigo}', [MotivoMovtoController::class, 'delete']);
    route::put('motivo_movto/{codigo}', [MotivoMovtoController::class, 'update']);
    route::patch('motivo_movto/{codigo}', [MotivoMovtoController::class, 'update']);
    route::get('motivo_movto/getnext', [MotivoMovtoController::class, 'getNext']);
});