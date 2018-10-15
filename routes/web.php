<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/empresas', 'EmpresaController');
Route::resource('/clientes', 'ClienteController');
Route::resource('/produtos', 'ProdutoController');
Route::resource('/vendas', 'VendaController');
Route::resource('/formasDePagamento', 'FormaDePagamentoController');
Route::resource('/cliente-empresas', 'ClienteEmpresaController');
Route::get('/relatorios', 'VendaController@relatoriosForm');
Route::post('vendas/relatorios', 'VendaController@relatorios')->name('vendas.relatorios');
Route::resource('/situacoes', 'SituacaoController');
