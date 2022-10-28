<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ordens/finish/{OrdemServico}', 'OrdemServicoController@finish')->name('ordens.finish');
Route::get('/ordens/generate/{OrdemServico}', 'OrdemServicoController@generate')->name('ordens.generate');

Route::resources([
    'servicos' => 'ServicoController',
    'clientes' => 'ClienteController',
    'ordens'   => 'OrdemServicoController',
]);
