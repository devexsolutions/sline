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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::resource('trabajos', \App\Http\Controllers\TrabajosController::class);
Route::get('trabajos', '\App\Http\Controllers\TrabajosController@index')->name('trabajos.index');
Route::get('trabajos/edit/{id}', '\App\Http\Controllers\TrabajosController@edit')->name('trabajos.edit');

Route::get('trabajos/selecciona-tarifa', '\App\Http\Controllers\TrabajosController@seleccionaTarifa')->name('trabajos.selecciona-tarifa');
Route::post('trabajos/selecciona-tarifa', '\App\Http\Controllers\TrabajosController@postSeleccionaTarifa')->name('trabajos.selecciona-tarifa.post');

Route::get('trabajos/datos-paciente', '\App\Http\Controllers\TrabajosController@datosPaciente')->name('trabajos.datos-paciente');
Route::post('trabajos/datos-paciente', '\App\Http\Controllers\TrabajosController@postDatosPaciente')->name('trabajos.datos-paciente.post');
  
Route::get('trabajos/documentos-legales', '\App\Http\Controllers\TrabajosController@documentosLegales')->name('trabajos.documentos-legales');
Route::post('trabajos/documentos-legales', '\App\Http\Controllers\TrabajosController@postDocumentosLegales')->name('trabajos.documentos-legales.post');
  
Route::get('trabajos/adjuntar-imagenes', '\App\Http\Controllers\TrabajosController@adjuntarImagenes')->name('trabajos.adjuntar-imagenes');
Route::post('trabajos/adjuntar-imagenes', '\App\Http\Controllers\TrabajosController@postAdjuntarImagenes')->name('trabajos.adjuntar-imagenes.post');