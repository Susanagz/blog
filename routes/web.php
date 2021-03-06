<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\BebidaController;

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

Route::get('/bienvenida', function($nombre, $apellido= null){
    return view('bienvenida');
});
//---------------------------------------------------------------------| CRUD Grabaciones |---------

Route::resource('alimento', AlimentoController::class);
Route::resource('bebida', BebidaController::class);
