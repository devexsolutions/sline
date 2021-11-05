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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('forms', 'forms')->name('forms');
    //Route::view('tarifas', 'tarifas')->name('tarifas');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');

    Route::get('tarifas', '\App\Http\Controllers\PagesController@verTarifas')->name('tarifas');
    Route::get('solicitar-recogida', '\App\Http\Controllers\PagesController@solicitarRecogida')->name('solicitar-recogida');

    Route::get('dashboard', '\App\Http\Controllers\PagesController@verDashboard')->name('dashboard');



    Route::get('trabajos', '\App\Http\Controllers\TrabajosController@index')->name('trabajos');
    Route::get('trabajos/edit/{id}', '\App\Http\Controllers\TrabajosController@edit')->name('trabajos.edit');

    Route::get('trabajos/selecciona-tarifa', '\App\Http\Controllers\TrabajosController@seleccionaTarifa')->name('trabajos.selecciona-tarifa');
    Route::post('trabajos/selecciona-tarifa', '\App\Http\Controllers\TrabajosController@postSeleccionaTarifa')->name('trabajos.selecciona-tarifa.post');

    Route::get('trabajos/datos-paciente', '\App\Http\Controllers\TrabajosController@datosPaciente')->name('trabajos.datos-paciente');
    Route::post('trabajos/datos-paciente', '\App\Http\Controllers\TrabajosController@postDatosPaciente')->name('trabajos.datos-paciente.post');
    
    Route::get('trabajos/documentos-legales', '\App\Http\Controllers\TrabajosController@documentosLegales')->name('trabajos.documentos-legales');
    Route::post('trabajos/documentos-legales', '\App\Http\Controllers\TrabajosController@postDocumentosLegales')->name('trabajos.documentos-legales.post');
    
    Route::get('trabajos/adjuntar-imagenes', '\App\Http\Controllers\TrabajosController@adjuntarImagenes')->name('trabajos.adjuntar-imagenes');
    Route::post('trabajos/adjuntar-imagenes', '\App\Http\Controllers\TrabajosController@postAdjuntarImagenes')->name('trabajos.adjuntar-imagenes.post');
    
    Route::get('trabajos/adjuntar-stl', '\App\Http\Controllers\TrabajosController@adjuntarStl')->name('trabajos.adjuntar-stl');
    Route::post('trabajos/adjuntar-stl', '\App\Http\Controllers\TrabajosController@postAdjuntarStl')->name('trabajos.adjuntar-stl.post');


    Route::get('trabajos/view/{id}', '\App\Http\Controllers\TrabajosController@view')->name('trabajos.view');
    Route::post('trabajos/aceptar-planificacion', '\App\Http\Controllers\TrabajosController@postAceptarPlanificacion')->name('trabajos.aceptar-planificacion.post');
    Route::post('trabajos/rechazar-planificacion', '\App\Http\Controllers\TrabajosController@postRechazarPlanificacion')->name('trabajos.rechazar-planificacion.post');
    
    Route::post('trabajos/aceptar-envio', '\App\Http\Controllers\TrabajosController@postAceptarEnvio')->name('trabajos.aceptar-envio.post');
    Route::post('trabajos/rechazar-envio', '\App\Http\Controllers\TrabajosController@postRechazarEnvio')->name('trabajos.rechazar-envio.post');
});

Route::get('admin/trabajos', ['\App\Http\Controllers\AdminController', 'index'])->name('admin.trabajos')->middleware('is_admin');
Route::get('admin/trabajos/{id}', ['\App\Http\Controllers\AdminController', 'view'])->name('admin.trabajos.view')->middleware('is_admin');
Route::post('admin/trabajos/guardar-planificacion', '\App\Http\Controllers\AdminController@postGuardarPlanificacion')->name('admin.trabajos.guardar-planificacion.post')->middleware('is_admin');
Route::post('admin/trabajos/guardar-factura', '\App\Http\Controllers\AdminController@postGuardarFactura')->name('admin.trabajos.guardar-factura.post')->middleware('is_admin');
Route::post('admin/trabajos/guardar-presupuesto', '\App\Http\Controllers\AdminController@postGuardarPresupuesto')->name('admin.trabajos.guardar-presupuesto.post')->middleware('is_admin');
Route::post('admin/trabajos/guardar-envio', '\App\Http\Controllers\AdminController@postGuardarEnvio')->name('admin.trabajos.guardar-envio.post')->middleware('is_admin');

Route::get('admin/usuarios', ['\App\Http\Controllers\AdminController', 'listarUsuarios'])->name('admin.usuarios')->middleware('is_admin');
Route::get('admin/usuarios/{id}', ['\App\Http\Controllers\AdminController', 'verUsuario'])->name('admin.usuarios.view')->middleware('is_admin');
Route::post('admin/usuarios/activar-usuario', '\App\Http\Controllers\AdminController@postActivarUsuario')->name('admin.usuarios.activar-usuario.post')->middleware('is_admin');

//Route::get('send-mail', 'MailController@sendMail')->name('send.mail');
