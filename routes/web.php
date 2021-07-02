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
Route::resource('saldo', 'App\Http\Controllers\SaldoController');
Route::resource('config', 'App\Http\Controllers\Config\ConfigController');
Route::resource('categoria', 'App\Http\Controllers\CategoriaController');
Route::resource('contenido', 'App\Http\Controllers\ContenidoController');
Route::resource('autor', 'App\Http\Controllers\AutorController');
Route::resource('promocion', 'App\Http\Controllers\PromocionController');
Route::resource('lista', 'App\Http\Controllers\ListaController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/config', [App\Http\Controllers\Config\ConfigController::class, 'index'])->name('config');
Route::get('/config/eliminar', [App\Http\Controllers\Config\ConfigController::class, 'delete_account'])->name('config');
Route::get('/config/cuenta', [App\Http\Controllers\Config\ConfigController::class, 'datos_personales'])->name('config');
Route::get('/saldo', [App\Http\Controllers\SaldoController::class, 'index'])->name('saldo');
Route::get('/contenido', [App\Http\Controllers\ContenidoController::class, 'index'])->name('contenido');
Route::get('/autor', [App\Http\Controllers\AutorController::class, 'index'])->name('autor');
Route::post('/contenido', 'App\Http\Controllers\ContenidoController@subirArchivo')->name('contenido');
Route::get('/promocion', [App\Http\Controllers\PromocionController::class, 'index'])->name('promocion');
Route::get('/lista', [App\Http\Controllers\ListaController::class, 'index'])->name('lista');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('lista');
