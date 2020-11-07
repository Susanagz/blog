<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrabacionController;
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
/*
//Listado de Grabaciones
Route::get('grabaciones', [GrabacionController::class, 'index']);
//Crear Grabación -> Formulario
Route::get('grabaciones/create', [GrabacionController::class, 'create']);
Route::get('grabaciones/{grabacion}', [GrabacionController::class, 'show']);

Route::get('grabaciones/{grabacion}/edit', [GrabacionController::class, 'edit']);
Route::get('grabaciones/{grabacion}', [GrabacionController::class, 'update']);
Route::get('grabaciones/{grabacion}/delete', [GrabacionController::class, 'destroy']);
*/

Route::resource('grabacion', GrabacionController::class);
Route::resource('alimento', AlimentoController::class);
Route::resource('bebida', BebidaController::class);

/*
//Guarda a la base de datos el registro de grabación
Route::post('grabaciones', function(request $request){
    ///dd('LLega a metodo para guardar');
    //Recibe datos
    //Valida
    //Guarda
    //Redirecciona
    return redirect('/grabaciones');
});
//Mostrar detalle de Grabación
Route::get('grabaciones/{id}', function(){
    //
});
//Editar Grabaciones
Route::get('grabaciones/{id}/edit', function(){
    //
});
//Actualiza registro en DB
Route::post('grabaciones/{id}', function(request $request){
    ///dd('LLega a metodo para guardar');
    //Recibe datos
    //Valida
    //Guarda
    //Redirecciona
    return redirect('/grabaciones');
});
//Eliminar Grabaciones
*/
