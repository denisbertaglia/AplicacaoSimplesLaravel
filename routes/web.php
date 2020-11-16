<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ VendasController::class, 'index' ])
    ->name("venda.registro");
    
Route::get('/historico', [ VendasController::class, 'historico' ])
    ->name("venda.historico");
    
Route::get('/produto/{idProduto?}', [ ProdutoController::class, 'recuperaProdutos' ])
    ->name("produto.recupera");
    
Route::post('/registroVenda', [ VendasController::class, 'registro' ])
->name("venda.realizar.registro");

Route::get('/venda/{idVenda}', [ VendasController::class, 'resgatarVenda' ])
    ->name("venda.resgatar");


    