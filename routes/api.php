<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::name('api.')->group(function ($route){
    $route->resource('/empresas', 'EmpresaController');
});
Route::name('api.')->group(function ($route){
    $route->resource('/clientes', 'ClienteController');
});
Route::name('api.')->group(function ($route){
    $route->resource('/produtos', 'ProdutoController');
});
Route::name('api.')->group(function ($route){
    $route->resource('/vendas', 'VendaController');
});
Route::name('api.')->group(function ($route){
    $route->resource('/formasDePagamento', 'FormaDePagamentoController');
});
Route::name('api.')->group(function ($route){
    $route->resource('/cliente-empresas', 'ClienteEmpresaController');
});